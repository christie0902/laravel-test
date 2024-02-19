<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class VideogameController extends Controller
{
    public function topRated()
    {
        $top_games = DB::select("
        SELECT `movies`.`name` AS 'game_name', `movies`.`year` AS 'year', `movies`.`rating` AS 'rating'
        FROM `movies`
        LEFT JOIN `movie_types` ON `movies`.`movie_type_id` = `movie_types`.`id`
        WHERE `movie_types` . `name` = ?
        ORDER BY `movies`.`rating` DESC
        LIMIT 50
        ", ['game']);
        
        return view('games.top-rated', compact('top_games'));
    }
}
