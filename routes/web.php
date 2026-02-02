<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\AuthController;

// Route Halaman Utama & Search
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [RentalController::class, 'search'])->name('rental.search');

// Route Auth (Login & Register)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Detail Produk
Route::get('/product/{id}', [RentalController::class, 'show'])->name('product.detail');

// Keranjang (Cart) logic
Route::get('/cart', [RentalController::class, 'cart'])->name('cart.index');
Route::post('/cart/add', [RentalController::class, 'addToCart'])->name('cart.add');
Route::patch('/cart/update/{id}', [RentalController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove/{id}', [RentalController::class, 'removeFromCart'])->name('cart.remove');