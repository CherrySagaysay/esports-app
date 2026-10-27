<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamerController;


Route::get('/home', function () {
    return view('welcome');
});

Route::get('/', [GamerController::class, 'index'])
    ->name('gamers.index');

Route::post('/gamers', [GamerController::class, 'store'])
    ->name('gamers.store');
