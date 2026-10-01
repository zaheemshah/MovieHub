<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| HOME ROUTE (MovieHub)
|--------------------------------------------------------------------------
*/
Route::get('/', [MovieController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| SEARCH ROUTE
|--------------------------------------------------------------------------
*/
Route::get('/search', [MovieController::class, 'search'])->name('search');

/*
|--------------------------------------------------------------------------
| MOVIE DETAILS PAGE
|--------------------------------------------------------------------------
*/
Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movie.show');

/*
|--------------------------------------------------------------------------
| FAVORITES SYSTEM
|--------------------------------------------------------------------------
*/
Route::post('/favorite/{id}', [MovieController::class, 'favorite'])->name('favorite.add');

Route::get('/favorites', [MovieController::class, 'favorites'])->name('favorites');

Route::delete('/favorite/{id}', [MovieController::class, 'removeFavorite'])->name('favorite.remove');

/*
|--------------------------------------------------------------------------
| DASHBOARD (Breeze default)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| PROFILE ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';