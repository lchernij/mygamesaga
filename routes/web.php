<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GameGenreController;
use App\Http\Controllers\Admin\GamePlataformController;
use App\Http\Controllers\Admin\GameTagController;
use App\Http\Controllers\Guess\HomeController;
use Illuminate\Support\Facades\Route;

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

# Guess context
Route::get('/', [HomeController::class, 'index'])->name('home');

# Admin context
Route::prefix('hq')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/game-genres', GameGenreController::class);
    Route::get('/game-genres/{game_genre}/active', [GameGenreController::class, 'active'])->name('game-genres.active');
    Route::get('/game-genres/{game_genre}/inactive', [GameGenreController::class, 'inactive'])->name('game-genres.inactive');

    Route::resource('/game-plataforms', GamePlataformController::class);
    Route::get('/game-plataforms/{game_plataform}/active', [GamePlataformController::class, 'active'])->name('game-plataforms.active');
    Route::get('/game-plataforms/{game_plataform}/inactive', [GamePlataformController::class, 'inactive'])->name('game-plataforms.inactive');

    Route::resource('/game-tags', GameTagController::class);
    Route::get('/game-tags/{game_tag}/active', [GameTagController::class, 'active'])->name('game-tags.active');
    Route::get('/game-tags/{game_tag}/inactive', [GameTagController::class, 'inactive'])->name('game-tags.inactive');
});

# Auth context
require __DIR__ . '/auth.php';
