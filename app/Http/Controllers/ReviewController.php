<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store($movie_id, Request $request)
    {
        if ($request->has('text')) {
            $review = new Review();
            $review->movie_id = $movie_id;
            $review->text = $request->input('text');
            $review->save();
            return redirect()->back();
        } else
            return view('movies.details');
        //back to the page you came from
    }
}
