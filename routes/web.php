<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventController::class, 'index']);

// Route::get('/', function () {
//     return view('welcome');
// })->name('login');
