<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date|after_or_equal:today',
            'waktu_mulai' => 'required',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'waktu_selesai' => 'required',
        ], [
            'tanggal_mulai.after_or_equal' => 'Tanggal mulai tidak boleh di masa lalu',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus sama atau setelah tanggal mulai',
        ]);

        $tanggalMulai = $request->tanggal_mulai;
        $waktuMulai = $request->waktu_mulai;
        $tanggalSelesai = $request->tanggal_selesai;
        $waktuSelesai = $request->waktu_selesai;

        return view('rental.search', compact(
            'tanggalMulai', 
            'waktuMulai', 
            'tanggalSelesai', 
            'waktuSelesai'
        ));
    }

    // Menampilkan Detail Produk
    public function show($id)
    {
        $product = Product::with('variants')->findOrFail($id);
        return view('rental.detail', compact('product'));
    }

    // Menampilkan Halaman Keranjang
    public function cart()
    {
        $cart = session()->get('cart', []);
        return view('rental.cart', compact('cart'));
    }

    // Tambah ke Keranjang dari Halaman Detail
    public function addToCart(Request $request)
    {
        $variant = ProductVariant::with('product')->findOrFail($request->variant_id);
        $cart = session()->get('cart', []);

        $currentInCart = isset($cart[$variant->id]) ? $cart[$variant->id]['quantity'] : 0;
        
        if (($currentInCart + $request->quantity) > $variant->stok_total) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi!');
        }

        if(isset($cart[$variant->id])) {
            $cart[$variant->id]['quantity'] += $request->quantity;
        } else {
            $cart[$variant->id] = [
                "name" => $variant->product->nama_alat,
                "variant_name" => $variant->size,
                "quantity" => $request->quantity,
                "price" => $variant->harga_per_hari,
                "image" => $variant->product->image,
                "variant_id" => $variant->id
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Produk masuk keranjang!');
    }

    // Update Jumlah (Tambah/Kurang) di Halaman Keranjang
    public function updateCart(Request $request, $id)
    {
        $cart = session()->get('cart');
        
        if (isset($cart[$id])) {
            $variant = ProductVariant::find($id);

            if ($request->action == 'increase') {
                // Validasi agar tidak melebihi stok database
                if ($cart[$id]['quantity'] < $variant->stok_total) {
                    $cart[$id]['quantity']++;
                } else {
                    return redirect()->back()->with('error', 'Stok maksimal tercapai!');
                }
            } elseif ($request->action == 'decrease') {
                if ($cart[$id]['quantity'] > 1) {
                    $cart[$id]['quantity']--;
                }
            }
            
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }
    
    // Fungsi hapus dari keranjang
    public function removeFromCart($id)
    {
        $cart = session()->get('cart');
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Item dihapus dari keranjang');
    }
}