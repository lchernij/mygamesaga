<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GamePlataformController;
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

    Route::resource('/game-plataforms', GamePlataformController::class);
    Route::get('/game-plataforms/{game_plataform}/active', [GamePlataformController::class, 'active'])->name('game-plataforms.active');
    Route::get('/game-plataforms/{game_plataform}/inactive', [GamePlataformController::class, 'inactive'])->name('game-plataforms.inactive');
});

# Auth context
require __DIR__ . '/auth.php';
