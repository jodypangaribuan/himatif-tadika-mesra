<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Home route
Route::get('/', [HomeController::class, 'index'])->name('home');
