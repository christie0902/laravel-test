<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\MoviePerson;
use App\Models\Position;
use App\Models\Genre;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::orderBy('name', 'asc')     // FROM `movies` ORDER BY `name` ASC
            ->where('name', '!=', '')
            ->where('votes_nr', '>=', 10000)// WHERE `votes_nr` >= 10000
            ->limit(20)                      // LIMIT 20
            ->get();
        // dd($movies);
        //the values of the table are in attributes

        // $names = $movies->pluck('name','id');
        // $movies = $movies->keyBy('name') //name will become the keys
        //only get the name and id column

        return view('movies.movies', compact('movies'));
    }
    public function topRated()
    {
        $top_movies = DB::select("
        SELECT *
        FROM `movies`
        ORDER BY `rating` DESC
        LIMIT 50
        ");
        // dd($top_movies);

        return view('movies.top-rated', compact('top_movies'));
    }

    public function shawshank()
    {
        $shawshank = DB::selectOne("
        SELECT *
        FROM `movies`
        WHERE `name` LIKE '%Shawshank%'
        ");

        return view('movies.details', compact('shawshank'));
    }

    // Create instance of Request from Client to access querry properties which stands for the part after ?
    // public function search(Request $request)
    // {
    //     // $search_query = $request->query('search_query');

    //     // $search_result = DB::select("
    //     //     SELECT *
    //     //     FROM `movies`
    //     //     WHERE `name` LIKE '%$search_query%'
    //     //     LIMIT 10
    //     // ");
    //     return view('movies.search');
    // }

    public function searchKeyword(Request $request)
    {
        $search_query = $request->input('search');
        $search_result = Movie::where('name', 'like', '%' . $search_query . '%')
            ->limit(10)
            ->get();

        return view('movies.search', compact('search_result'));
    }

    //get the genre romance
    public function romance()
    {
        $genre = Genre::where('name', 'romance')->first();
        $romance_movies = $genre->movies()
            ->limit(20)
            ->orderBy('name', 'asc')
            ->get();
        //display only romance movies
    }

    public function edit()
    {
        $movie_id = 111161;

        $movie = Movie::findOrFail($movie_id);

        // display the form
        return view('movie.edit', compact('movie'));
    }

    public function save()
    {
        // handle the form's submission

        $movie_id = 111161;

        $movie = Movie::findOrFail($movie_id);

        $movie->name = $_POST['name'] ?? $movie->name;
        $movie->year = $_POST['year'] ?? $movie->year;

        $movie->genres()->sync([37, 43]);
        //only keep movie_id with 37 and 43 on the intermediate table and remove the rest
        // attach -> add row on intermediate table with the values, detach -> remove

        $movie->save();

        return redirect('/movies/edit');
    }

    public function actorDetail()
    {
        $actors = MoviePerson::select('movie_person.description', 'positions.slug', 'movies.name')
            ->leftJoin('positions', 'positions.id', '=', 'movie_person.position_id')
            ->leftJoin('movies', 'movies.id', '=', 'movie_person.movie_id')
            ->where('slug', 'cast')
            ->limit(10)
            ->get();


        return view('actors.actor', compact('actors'));
    }

    public function action($year = null, $min_rating = null)
    {
        // handle validation inside
        // if ($year && !preg_match('#^'\d{4}$#', $year))
        // {
        //     abort('404', 'Year is not a number');
        // }
        $genre = Genre::where('name', 'action')->first();
        $action_movies = $genre->movies()
            ->where('name', '!=', '')
            ->limit(20)
            ->orderBy('rating', 'desc')
            ->get();
        if ($year) {
            $action_movies->where('year', $year);
        }
        if ($min_rating) {
            $action_movies->where('rating', '>=', $min_rating);
        }
        return view('movies.action', compact('action_movies'));
    }

    public function searchGenre(Request $request)
    {
        $search_query = $request->input('genre');
        if ($search_query) {
            $genre = Genre::where('name', 'like', '%' . $search_query . '%')->first();
            $search_result = $genre->movies()
                ->where('name', '!=', '')
                ->limit(20)
                ->orderBy('rating', 'desc')
                ->get();

            return view('movies.search_genre', compact('search_result'));
        } else
            return view('movies.search_genre');
    }
}
