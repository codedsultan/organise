<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventController::class, 'index'])->name('event.index');
Route::get('/{id}', [EventController::class, 'show'])->name('event.show');

Route::get('/login', function () {
    return view('welcome');
})->name('login');


Route::get('/test', function () {
    return view('welcome');
})->name('test');
