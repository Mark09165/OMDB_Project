<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OmdbController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return view('welcome');
});

// --- BUSCAR PELÍCULAS ---
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');

// --- DETALLES DE UNA PELÍCULA ---
Route::get('/movies/{imdbID}', [OmdbController::class, 'details'])
    ->name('movies.details');

// --- FAVORITOS CRUD ---
Route::get('/favorites', [FavoriteController::class, 'index'])
    ->name('favorites.index'); // GET para ver favoritos

Route::post('/favorites', [FavoriteController::class, 'store'])
    ->name('favorites.store'); // POST para agregar

Route::delete('/favorites/{id}', [FavoriteController::class, 'destroy'])
    ->name('favorites.destroy'); // DELETE para eliminar

Route::get('/favorites/{id}/edit', [FavoriteController::class, 'edit'])
    ->name('favorites.edit'); // GET para mostrar formulario de edición

Route::put('/favorites/{id}', [FavoriteController::class, 'update'])
    ->name('favorites.update'); // PUT para actualizar nota