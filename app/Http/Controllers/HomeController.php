<?php

namespace App\Http\Controllers;

use App\Models\Product; // Pastikan ini di-import
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Kita ambil semua produk, walaupun belum punya varian (untuk testing)
        $products = Product::whereNull('deleted_at')->get();

        return view('home', compact('products'));
    }
}