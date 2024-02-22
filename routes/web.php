<?php

use App\Http\Controllers\MovieRequest;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\VideogameController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ReviewController as Review;
use App\Http\Controllers\MovieRequestController;

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
Route::get('/movies/top-rated-movies', [MovieController::class, 'topRated'])->name('movie.top');
Route::get('/top-rated-games', [VideogameController::class, 'topRated'])->name('game.top');
Route::get('/movies/shawshank-redemption', [MovieController::class, 'shawshank']);


// Route::get('/movies/search', [MovieController::class, 'search']);
Route::get('/movies/search', [MovieController::class, 'searchKeyword']);
Route::get('/actor', [MovieController::class, 'actorDetail']);

Route::get('/movies/action', [MovieController::class, 'action']);
Route::get('/movies/genre', [MovieController::class, 'searchGenre']);

Route::get('/about-us', [AboutController::class, 'aboutUs']);

//have parameters but optional, so you still can use /movies
//force the parameter to be number
//year has to be exactly 4 digits
Route::get('/movies/{year?}/{min_rating?}', [MovieController::class, 'action'])
    ->where('year', '\d{4}')
    ->whereNumber('min_rating');

Route::get('/movies/{year?}/{min_rating?}', [MovieController::class, 'indexYear'])
    ->where('year', '\d{4}')
    ->whereNumber('min_rating')
    ->name('movies.index');

Route::get('/movie/{movie_id}', [IndexController::class, 'movieDetail'])->name('movies.detail');
Route::post('/movies/{movie_id}/review', [Review::class, 'store'])->name('movies.review');

// Route::get('/movies/movie_requests', [MovieRequestController::class, 'displayRequests'])->name('movies.request');

Route::get('/movie-requests', [MovieRequestController::class, 'index'])->name('movie-requests');
Route::post('/movie-requests/store', [MovieRequestController::class, 'store'])->name('movie-request.store');
Route::get('/movie-requests/edit/{id}', [MovieRequestController::class, 'edit'])->name('movie-request.edit');
Route::put('/movie-requests/update/{id}', [MovieRequestController::class, 'update'])->name('movie-request.update');


// Form
Route::get('/movies', ['App\Http\Controllers\MovieController', 'index'])->name('movie.all');
Route::put('/movie/edit/{id}', [MovieController::class, 'save'])->name('movie.save');
Route::get('/movie/edit/{id}', [MovieController::class, 'edit'])->name('movie.edit');



















// // the {slug} parameter must be a non-numeric word for the URL to match this route
// Route::get('/products/{slug}', [ProductController::class, 'category'])->whereAlpha('slug');

// // the {order} parameter must be one of 'name', 'price', 'availability'
// Route::get('/products/{order}', [ProductController::class, 'index'])->whereIn('order', ['name', 'price', 

// Just show HTML, potentially pass some values
// Route::view('/terms-and-conditions', 'pages/terms_and_conditions', ['foo' => 'bar']);

//redirect for old and new domain both work
// Route::redirect('/old_url', '/new_url', 301); // 301 is the HTTP response code
// 301 - moved permanently. The browser is supposed to remember this and next time go directly to the new URL.
// 302 - moved temporarily. The browser should still be trying the original URL even though it will get redirected.