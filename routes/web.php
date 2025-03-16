<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LoginRegisterController;

Route::group( [],function () {
    //Without auth
    Route::get('/', [FrontendController::class, 'homePage'])->name('home');
    Route::get('/login', [LoginRegisterController::class, 'loginPage'])->name('login');
    // Login routes
    Route::post('/login/request-otp', [LoginRegisterController::class, 'requestOtp'])->name('login.request-otp');
    Route::post('/login', [LoginRegisterController::class, 'loginAuthenticate'])->name('login.authenticate');
    Route::get('/register', [LoginRegisterController::class, 'registerPage'])->name('register');
    Route::post('/register', [LoginRegisterController::class, 'registerAuthenticate'])->name('register.authenticate');
    Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('logout');
    Route::get('/forgot-password', [LoginRegisterController::class, 'forgotPasswordPage'])->name('forgot-password');
    Route::post('/forgot-password', [LoginRegisterController::class, 'forgotPasswordAuthenticate'])->name('forgot-password.authenticate');

    //With auth
    Route::middleware(['auth'])->name('frontend.')->group(function () {
        Route::get('/association-members', [FrontendController::class, 'associationMembers'])->name('association_members');
        Route::get('/batch-wise-members/{year}', [FrontendController::class, 'batchMembers'])->name('batch_wise_members');
        Route::get('/occupation-wise-members/{occupation}', [FrontendController::class, 'occupationMembers'])->name('occupation_wise_members');
    });
});


