<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\VideogameController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index']);

//when the user come to the path /awards with GET request method > Handle with the index emthod of AwardController class
// Route::get('/awards', ['App\Http\Controllers\AwardController', 'index']);
Route::get('/awards', [AwardController::class, 'index']);
Route::get('/awards2', [AwardController::class, 'index2']);
Route::get('/movies/top-rated-movies', [MovieController::class, 'topRated']);
Route::get('/top-rated-games', [VideogameController::class, 'topRated']);
Route::get('/movies/shawshank-redemption', [MovieController::class, 'shawshank']);
Route::get('/movies', ['App\Http\Controllers\MovieController', 'index']);

// Route::get('/movies/search', [MovieController::class, 'search']);
Route::get('/movies/search', [MovieController::class, 'searchKeyword']);



