<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AwardController;

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

Route::get('/', function () {
    return view('welcome');
});

//when the user come to the path /awards with GET request method > Handle with the index emthod of AwardController class
// Route::get('/awards', ['App\Http\Controllers\AwardController', 'index']);
Route::get('/awards', [AwardController::class, 'index']);
Route::get('/awards2', [AwardController::class, 'index2']);