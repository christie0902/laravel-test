<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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

            // dd($movie);
        
        // $title = 'Hello';
        // $text = 'It is running';
        return view('index.index', compact('movie'));
        
    }
}
