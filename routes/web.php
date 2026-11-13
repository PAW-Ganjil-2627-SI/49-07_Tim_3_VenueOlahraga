<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\AuthController;

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});


Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('role:admin,staff')->group(function () {
        Route::get('/', [PelangganController::class, 'index']);
        Route::resource('pelanggan', PelangganController::class)->except(['destroy']);
    });

    Route::middleware('role;admin')->group(function(){
        Route::delete('/pelanggan/{pelanggan}', [PelangganController::class,'destroy'])->name('pelanggan.destroy');
    });
});
