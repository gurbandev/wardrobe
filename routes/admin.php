<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RegisterController;
use Illuminate\Support\Facades\Route;

Route::controller(RegisterController::class)
    ->middleware('guest')
    ->group(function () {
        Route::get('register', 'create')->name('register');
        Route::post('register', 'store');
    });

Route::controller(LoginController::class)
    ->middleware('guest')
    ->group(function () {
        Route::get('login', 'create')->name('login');
        Route::post('login', 'store');
    });

Route::controller(LoginController::class)
    ->middleware('auth')
    ->group(function () {
        Route::post('logout', 'destroy')->name('logout');
    });