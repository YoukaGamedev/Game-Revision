<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameRevisionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AdmController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Halaman Awal (Welcome)
|--------------------------------------------------------------------------
*/
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

/*
|--------------------------------------------------------------------------
| Autentikasi (Login / Logout)
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->middleware('guest') // kalau sudah login, tidak bisa buka login lagi
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Halaman yang Butuh Login
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::resource('revisions', GameRevisionController::class);
    Route::resource('users', UserController::class);
    Route::resource('app', AdmController::class);
});
