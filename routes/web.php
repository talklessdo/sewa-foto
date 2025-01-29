<?php

use App\Http\Controllers\BookingController;
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
Route::get('/akun',[DashboardController::class, 'akun'])->middleware('auth');
Route::post('/add_akun',[DashboardController::class, 'add_akun'])->middleware('auth');
Route::get('/form_akun',[DashboardController::class, 'formAkun'])->middleware('auth');
Route::get('/detail/{pakets:slug}',[DashboardController::class, 'show'])->middleware('auth');
Route::get('/form/{pakets:slug}',[DashboardController::class, 'form'])->middleware('auth');
Route::post('/update_form',[DashboardController::class, 'updateForm'])->middleware('auth');
Route::post('/booking',[BookingController::class, 'store'])->middleware('auth');
Route::get('/pending',[BookingController::class, 'pending'])->middleware('auth');
Route::get('/cancel',[BookingController::class, 'cancel'])->middleware('auth');
Route::get('/approve',[BookingController::class, 'approve'])->middleware('auth');
Route::get('/detail_pending/{bookings:kode_booking}',[BookingController::class, 'detail_pending'])->middleware('auth');
Route::get('/detail_cancel/{bookings:kode_booking}',[BookingController::class, 'detail_cancel'])->middleware('auth');
Route::get('/detail_approve/{bookings:kode_booking}',[BookingController::class, 'detail_approve'])->middleware('auth');
Route::get('/cetak_pdf/{bookings:kode_booking}',[BookingController::class, 'print'])->middleware('auth');
Route::get('/keluar',[LoginController::class, 'keluar']);
Route::post('/login',[LoginController::class, 'otentik']);
Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);
