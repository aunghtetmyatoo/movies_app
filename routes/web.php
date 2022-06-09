<?php

use App\Http\Controllers\MovieInfoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieInfoController::class, 'index']);

Route::get('/movies', [MovieInfoController::class, 'movies'])->name('movies');
Route::get('/movie/{id}', [MovieInfoController::class, 'movie_detail'])->name('movie_detail');
Route::get('/movies/page/{page}', [MovieInfoController::class, 'movies_page']);

Route::get('/tv_shows', [MovieInfoController::class, 'tv_shows'])->name('tv_shows');
Route::get('/tv/{id}', [MovieInfoController::class, 'tv_detail'])->name('tv_detail');
Route::get('/tv_shows/page/{page}', [MovieInfoController::class, 'tv_shows_page']);

Route::get('/stars', [MovieInfoController::class, 'stars'])->name('stars');
Route::get('/star/{id}', [MovieInfoController::class, 'star_detail'])->name('star_detail');
Route::get('/stars/page/{page}', [MovieInfoController::class, 'stars_page']);

Route::post('/search', [MovieInfoController::class, 'search'])->name('search');
Route::post('/search/page/{page}', [MovieInfoController::class, 'search_page']);



