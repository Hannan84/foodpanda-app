<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExternalLoginController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/auth/external-login', [ExternalLoginController::class, 'handle']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/logout', [LoginController::class, 'logout']);
