<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class MovieController extends Controller
{
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
    public function search(Request $request)
    {
        // $search_query = $request->query('search_query');
        
        // $search_result = DB::select("
        //     SELECT *
        //     FROM `movies`
        //     WHERE `name` LIKE '%$search_query%'
        //     LIMIT 10
        // ");
        return view('movies.search');
    }

    public function searchKeyword(Request $request)
    {
    $search_query = $request->input('search');

    $search_result = DB::select("
            SELECT *
            FROM `movies`
            WHERE `name` LIKE '%$search_query%'
            LIMIT 10
        ");
 
    return view('movies.search', compact('search_result'));
    }
}
