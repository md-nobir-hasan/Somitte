<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

Route::name('frontend.')->group( function () {
    Route::get('/', [FrontendController::class, 'homePage'])->name('home');
    Route::get('/association-members', [FrontendController::class, 'associationMembers'])->name('association_members');
});
