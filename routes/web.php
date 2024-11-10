<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    FilmController,
    CastController,
};

Route::get('/', [FilmController::class, 'movieHome'])->name('home');
Route::get('/movies', [FilmController::class, 'movies'])->name('movies');
Route::get('/movies/{film}', [FilmController::class, 'show'])->name('movies.show');
Route::get('/movies/genre/{genre}', [FilmController::class, 'moviesByGenre'])->name('genre');

Route::resource('cast', CastController::class);
Route::post('/cast/store', [CastController::class, 'store'])->name('cast.store');
Route::get('/cast/{id}', [CastController::class, 'show'])->name('cast.show');    
Route::get('/cast/{id}/edit', [CastController::class, 'edit'])->name('cast.edit');
Route::put('/cast/{id}', [CastController::class, 'update'])->name('cast.update');
