<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventController::class, 'index']);

Route::get('/login', function () {
    return view('welcome');
})->name('login');


Route::get('/test', function () {
    return view('welcome');
})->name('test');
