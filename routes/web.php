<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\DashboardController;

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('auth/register', function () {
    return view('auth.register');
})->name('register');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
