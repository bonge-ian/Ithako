<?php

use App\Http\Controllers\GamesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GamesController::class, 'index'])->name('games.index');
Route::get('/{slug}', [GamesController::class, 'show'])->name('games.show');

 
