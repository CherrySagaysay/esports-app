<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GamerController;

// Guest Routes
Route::middleware('guest')->group(function () {

    Route::get('/register', [AuthController::class, 'showRegistrationForm'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLoginForm'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login']);
});

// Authenticated Routes
Route::middleware('auth')->group(function () {

    Route::get('/', [GamerController::class, 'index'])
        ->name('gamers.index');

    Route::post('/gamers', [GamerController::class, 'store'])
        ->name('gamers.store');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});
