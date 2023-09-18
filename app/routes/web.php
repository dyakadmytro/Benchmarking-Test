<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('social.login');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
Route::name('web.')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
    Route::get('/login', function () {
        return view('login');
    })->name('login');
    Route::get('/register', function () {
        return view('register');
    })->name('register');

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

    Route::middleware('auth:web')->group(function () {
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('web.welcome');
})->middleware(['auth:web', 'signed'])->name('verification.verify');
