<?php

use App\Http\Controllers\Web\AgentController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\ShiftController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('agents', AgentController::class);
Route::resource('shifts', ShiftController::class);
