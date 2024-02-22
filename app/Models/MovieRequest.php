<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieRequest extends Model
{
    use HasFactory;
    // public $id = null;
    // public $movie_type_id = null;
    // public $name = null;
    // public $length = null;
    // public $year = null;
    // public $start_year = null;
    // public $end_year = null;
    // public $register_person_name = null;
    // public $register_person_email = null;

    // Once creating model what can be assigned
    protected $fillable = [
        'movie_type_id',
        'name',
        'length',
        'year',
        'start_year',
        'end_year',
        'register_person_name',
        'register_person_email'
    ];
}
