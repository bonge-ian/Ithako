<?php

use App\Http\Controllers\GamesController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GamesController::class, 'index'])->name('games.index');
Route::get('/view/{slug}', [GamesController::class, 'show'])->name('games.show');

Route::get('/games', [PagesController::class, 'games'])->name('pages.games');
Route::get('/games/coming-soon', [PagesController::class, 'comingSoonGames'])->name('pages.coming-soon');
