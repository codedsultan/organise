<?php

use App\Http\Controllers\Organiser\AuthController;
use App\Http\Controllers\Organiser\DashboardController;
use App\Http\Controllers\Organiser\EventController;
use App\Http\Controllers\Organiser\ForgotPasswordController;
use Illuminate\Support\Facades\Route;


Route::prefix('organiser')->name('organiser.')->group(function(){

    Route::middleware(['guest:organiser'])->group(function(){
        Route::view('/login','dashboard.organiser.login')->name('login');
        Route::view('/register','dashboard.organiser.register')->name('register');
        Route::post('/create',[AuthController::class,'create'])->name('create');
        Route::post('/check',[AuthController::class,'check'])->name('check');

        Route::get('/verify',[AuthController::class,'verify'])->name('verify');

        Route::get('/password/forgot',[ForgotPasswordController::class,'showForgotForm'])->name('forgot.password.form');
        Route::post('/password/forgot',[ForgotPasswordController::class,'sendResetLink'])->name('forgot.password.link');
        Route::get('/password/reset/{token}',[ForgotPasswordController::class,'showResetForm'])->name('reset.password.form');
        Route::post('/password/reset',[ForgotPasswordController::class,'resetPassword'])->name('reset.password');
    });

    Route::middleware(['auth:organiser','verified_organiser'])->group(function(){
        // Route::view('/','dashboard.organiser.home')->name('home');
        Route::get('/',[DashboardController::class,'index'])->name('home');
        // Route::view('/home','dashboard.organiser.home')->name('home');
        Route::post('/logout',[AuthController::class,'logout'])->name('logout');


        Route::get('/events', [EventController::class, 'index'])->name('events');
        Route::get('/events/create', [EventController::class, 'create'])->name('create.events');
        Route::post('/events', [EventController::class, 'store'])->name('store.events');
        Route::get('/events/{id}', [EventController::class, 'show'])->name('show.events');
        Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('edit.events');
        Route::put('/events/{id}', [EventController::class, 'update'])->name('update.events');
        Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('destroy.events');
    });




});




// Route::get('organiser/email/verify', function () {
//     return view('auth.verify');
// })->middleware('auth:organiser')->name('verification.notice');


// Route::get('organiser/email/verify/{id}/{hash}',[AuthController::class,'verifyEmail'])
//     ->middleware(['auth:organiser', 'signed'])->name('verification.verify');


// Route::post('organiser/email/verification-notification',[AuthController::class,'verification'])
//         ->middleware(['auth:organiser', 'throttle:6,1'])->name('verification.send');

// Route::post('organiser/email/verification',[AuthController::class,'verification'])
//         ->middleware(['auth:organiser', 'throttle:6,1'])->name('verification.resend');
