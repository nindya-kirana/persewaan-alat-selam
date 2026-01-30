<?php

namespace App\Http\Controllers;

use App\Models\Product; // Pastikan ini di-import
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil produk beserta relasi varian harganya
        $products = Product::whereNull('deleted_at')
                   ->has('variants')
                   ->get();

        // Mengirimkan variabel $products ke file home.blade.php
        return view('home', compact('products'));
    }
}