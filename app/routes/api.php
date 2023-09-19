<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\AuthController;
use \App\Http\Controllers\Api\HomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::name('api.')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('home', [HomeController::class, 'index'])->name('home');
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    });
});


