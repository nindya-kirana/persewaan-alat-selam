<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RentalController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [RentalController::class, 'search'])->name('rental.search');