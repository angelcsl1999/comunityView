<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ActorsController;
use App\Http\Controllers\TVShowsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

//Get movies Controller->General

Route::get('/movies',[MoviesController::class, 'index'])->name('movies.index');
//Show an specific movie
Route::get('/movies/{movie}',[MoviesController::class, 'show'])->name('movies.show');



Route::get('/actors',[ActorsController::class, 'index'])->name('actors.index');
Route::get('/actors/page/{page}',[ActorsController::class, 'index'])->name('actors.index');
//Show an specific movie
Route::get('/actors/{actor}',[ActorsController::class, 'show'])->name('actors.show');


//tv shows

Route::get('/TVShows',[TVShowsController::class, 'index'])->name('TVShows.index');
Route::get('/TVShows/{tv}',[TVShowsController::class, 'show'])->name('TVShows.show');


//dev rol only
Route::get('/phpmyinfo', function () {
    phpinfo(); 
})->name('phpmyinfo');