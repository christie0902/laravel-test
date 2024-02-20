<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function movieType()
    {
        return $this->belongsTo(MovieType::class);
    }

    public function genre()
    {
        return $this->belongsToMany(Genre::class);
    }
}
