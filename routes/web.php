<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });
// Route::get('/daftar', function () {
//     return view('auth.daftar');
// });

Route::get('/',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/dashboard',[DashboardController::class, 'index'])->middleware('auth');
Route::get('/keluar',[LoginController::class, 'keluar']);
Route::post('/login',[LoginController::class, 'otentik']);
Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);
