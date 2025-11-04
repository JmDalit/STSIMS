<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\OtpRequestController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\RoleController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');
    Route::post('otp', [OtpRequestController::class, 'create'])->name('otp.check');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('roles', [RoleController::class, 'index'])->name('roles');
});

Route::middleware('auth')->group(function () {});
