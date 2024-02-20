<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoviePerson extends Model
{
    use HasFactory;
    protected $table = 'movie_person';
    public function position()
    {
        return $this->hasOne(Position::class);
    }
}
