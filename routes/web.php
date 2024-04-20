<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventController::class, 'index'])->name('home');
Route::get('/events/{id}', [EventController::class, 'show'])->name('event.show');

//Cart section
    Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add-to-cart')->middleware('auth:customer');
    Route::post('/add-to-cart', [CartController::class, 'singleAddToCart'])->name('single-add-to-cart')->middleware('auth:customer');
    Route::get('cart-delete/{id}', [CartController::class, 'cartDelete'])->name('cart-delete')->middleware('auth:customer');
    Route::post('cart-update', [CartController::class, 'cartUpdate'])->name('cart.update')->middleware('auth:customer');

    Route::get('/cart', function () {
        // return view('frontend.pages.cart');
    })->name('cart');
Route::get('/login', function () {
    return view('welcome');
})->name('login');


Route::get('/test', function () {
    return view('welcome');
})->name('test');

Route::get('/checkout', function () {
    return view('welcome');
})->name('checkout');
