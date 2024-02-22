<?php

namespace Database\Seeders;

use App\Models\MovieRequest;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MovieRequest::create([
            'name' => 'Movie 1',
            'movie_type_id' => 1,
            'year' => 2020,
            'start_year' => 2019,
            'end_year' => 2021,
            'register_person_name' => 'John Doe',
            'register_person_email' => 'john@example.com',
        ]);

        MovieRequest::create([
            'name' => 'Movie 2',
            'movie_type_id' => 2,
            'length' => 90,
            'year' => 2018,
            'start_year' => 2017,
            'end_year' => 2019,
            'register_person_name' => 'Jane Smith',
            'register_person_email' => 'jane@example.com',
        ]);
    }
}
