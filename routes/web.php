<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

Route::get('/',[FrontendController::class,'homePage'])->name('home');
