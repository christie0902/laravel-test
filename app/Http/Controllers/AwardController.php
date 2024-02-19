<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AwardController extends Controller
{
    public function index()
    {
        $awards = [
            'Oscars',
            'Golden Globes',
            'Bafta',
            'Emmy'
        ];
//data for view
        return view('awards.index', [
            'awards' => $awards
        ]);
    }

    public function index2()
    {
        $awards = [
            'Oscars',
            'Golden Globes',
            'Bafta',
            'Emmy'
        ];

        dump($awards);

        $title = 'Movie awards';

        $current_time = date('G:i:s');
        //data for view
        // return view('awards.index', [
        //     'title' => $title,
        //     'awards' => $awards
        //     'current_time' => $current_time
        // ]);
        // Generate the above array by using the variables.
        return view('awards.index', compact('title', 'awards', 'current_time'));
    }
}

//extract() method to turn array into variables