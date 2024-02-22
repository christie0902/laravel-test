<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieRequest;
use App\Models\MovieType;

class MovieRequestController extends Controller
{
    public function index(Request $request)
    {
        $all_request_data = $request->all(); // returns an array
        // dd($request->all(), $request->only(['limit', 'sort']), $request->except(['sort']));

        $limit = $request->input('limit');

        $search_query = $request->input('search');

        $movie_requests_query = MovieRequest::query();

        if ($search_query) {
            $movie_requests_query->where('name', $search_query);
        }

        $movie_requests = $movie_requests_query->limit($limit)
            ->get();

        // get all movie types and pass it to compact (will be used for select)
        $movie_types = MovieType::get();

        return view('movie-requests.index', compact('movie_requests', 'movie_types'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'full_name' => 'required',
            'email' => 'required',
            'movie_type_id' => 'required',
        ], [
            'name.required' => 'U DID NOT ENTER YOUR NAME!'
        ]);


        $data = $request->all();

        // MovieRequest::create($data);
        $new_movie_request = new MovieRequest;
        $new_movie_request->name = $data['name']; // $data->name - do not use like that!
        $new_movie_request->register_person_name = $data['full_name'];
        $new_movie_request->register_person_email = $data['email'];
        $new_movie_request->movie_type_id = $data['movie_type_id'];

        $new_movie_request->save(); // saved to the database

        session()->flash('success_message', 'Your movie request has been submitted!');

        return redirect()->back();
    }

    public function edit($id)
    {
        $movie_types = MovieType::get();

        $movie_request = MovieRequest::findOrFail($id);

        // if (!$movie_request) {
        //     return redirect()->back();
        // }

        return view('movie-requests.edit', compact('movie_types', 'movie_request'));
    }

    public function update(Request $request, $id)
    {
        $movie_request = MovieRequest::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'full_name' => 'required',
            'email' => 'required',
            'movie_type_id' => 'required',
        ], [
            'name.required' => 'U DID NOT ENTER YOUR NAME!'
        ]);

        $movie_request->name = $request->input('name');
        $movie_request->register_person_name = $request->input('full_name');
        $movie_request->register_person_email = $request->input('email');
        $movie_request->movie_type_id = $request->input('movie_type_id');
        $movie_request->save();

        return redirect()->route('movie-requests');

    }

}