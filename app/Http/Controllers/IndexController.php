<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Movie;

class IndexController extends Controller
{
    public function index()
    {
        $movie = DB::selectOne("
            SELECT *
            FROM `movies`
            WHERE `id` = ?
            ORDER BY `rating` DESC
            ", [
            111161
        ]);
        //query can be excluded
        $movie_of_the_week = Movie::query()
            ->select('*')
            ->where('id' . "=", 11161)
            ->first(); //SELECT * LIMIT 1

        // $title = 'Hello';
        // $text = 'It is running';
        $query_builder = Movie::query();

        $query_builder
            ->limit(10)
            ->where('year', '>', 2010)
            ->orderBy('name', 'asc');

        dd($query_builder->toSql());

        $movie = Movie::find(209); //Select from movies where id is 209

        $first_movie = $query_builder->first();
        $all_movies = $query_builder->get();
        return view('index.index', compact('movie'));

    }

    public function movieDetail()
    {
        $movie_id = $_GET['id'] ?? null;
        $movie = Movie::findOrFail($movie_id);
        //show 404 error page
    }
}
