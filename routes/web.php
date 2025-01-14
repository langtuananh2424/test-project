<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [PlayerController::class, 'index'])->name('player.index');
Route::get('/player/create', [PlayerController::class, 'create'])->name('player.create');
Route::post('/player', [PlayerController::class, 'store'])->name('player.store');
Route::get('/player/{id}', [PlayerController::class, 'show'])->name('player.show');
Route::get('/player/{id}/edit', [PlayerController::class, 'edit'])->name('player.edit');
Route::put('/player/{id}', [PlayerController::class, 'update'])->name('player.update');
Route::delete('/player/{id}', [PlayerController::class, 'destroy'])->name('player.destroy');

