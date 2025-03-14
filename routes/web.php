<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

Route::name('frontend.')->group( function () {
    Route::get('/', [FrontendController::class, 'homePage'])->name('home');
    Route::get('/association-members', [FrontendController::class, 'associationMembers'])->name('association_members');
    Route::get('/batch-wise-members/{year}', [FrontendController::class, 'batchMembers'])->name('batch_wise_members');
    Route::get('/occupation-wise-members/{occupation}', [FrontendController::class, 'occupationMembers'])->name('occupation_wise_members');
});
