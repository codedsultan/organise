<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ForgotPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->group(function(){

  Route::middleware(['guest'])->group(function(){
        Route::view('/login','dashboard.admin.login')->name('login');
        // Route::post('/create',[AuthController::class,'create'])->name('create');
        Route::post('/check',[AuthController::class,'check'])->name('check');

        // Route::get('/verify',[AuthController::class,'verify'])->name('verify');

        Route::get('/password/forgot',[ForgotPasswordController::class,'showForgotForm'])->name('forgot.password.form');
        Route::post('/password/forgot',[ForgotPasswordController::class,'sendResetLink'])->name('forgot.password.link');
        Route::get('/password/reset/{token}',[ForgotPasswordController::class,'showResetForm'])->name('reset.password.form');
        Route::post('/password/reset',[ForgotPasswordController::class,'resetPassword'])->name('reset.password');
  });

  Route::middleware(['auth:web'])->group(function(){
        Route::view('/','dashboard.admin.home')->name('home');
        // Route::get('/home',function(Request $request){
        //     dd($request->user()->name );
        //     return dd($request);
        // })->name('home');
        Route::post('/logout',[AuthController::class,'logout'])->name('logout');
  });




});
