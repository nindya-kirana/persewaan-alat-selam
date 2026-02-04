<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\rental_item;

class RentalController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date|after_or_equal:today',
            'waktu_mulai' => 'required',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'waktu_selesai' => 'required',
        ]);

        // Gabungkan tanggal dan waktu
        $start = $request->tanggal_mulai . ' ' . $request->waktu_mulai;
        $end = $request->tanggal_selesai . ' ' . $request->waktu_selesai;

        $products = Product::whereHas('variants', function ($query) use ($start, $end) {
            $query->where(function ($q) use ($start, $end) {
                $q->select('stok_total')
                ->from('product_variants as pv')
                ->whereColumn('pv.id', 'product_variants.id')
                ->limit(1);
            }, '>', function ($q) use ($start, $end) {
                $q->select(DB::raw('COALESCE(SUM(rental_items.qty), 0)'))
                ->from('rental_items')
                ->join('rentals', 'rentals.id', '=', 'rental_items.rental_id')
                ->whereColumn('rental_items.variant_id', 'product_variants.id')
                ->whereIn('rentals.status', ['booking', 'diambil'])
                ->where(function ($dateQuery) use ($start, $end) {
                    // Cek tgl_sewa dan tgl_kembali (pastikan kolom ini bertipe datetime atau date)
                    $dateQuery->whereBetween('rentals.tgl_sewa', [$start, $end])
                                ->orWhereBetween('rentals.tgl_kembali', [$start, $end])
                                ->orWhere(function ($overlap) use ($start, $end) {
                                    $overlap->where('rentals.tgl_sewa', '<=', $start)
                                            ->where('rentals.tgl_kembali', '>=', $end);
                                });
                });
            });
        })->with('variants')->get();

        return view('rental.search', compact('products', 'start', 'end'));
    }

    // Menampilkan Detail Produk
    public function show(Request $request, $id)
    {
        $product = Product::with('variants')->findOrFail($id);
        $start = $request->query('start');
        $end = $request->query('end');
    
        return view('rental.detail', compact('product', 'start', 'end'));
    }

    // Menampilkan Halaman Keranjang
    public function cart()
    {
        $cart = session()->get('cart', []);
        return view('rental.cart', compact('cart'));

        // buat hapus semua isi cart
        // session()->forget('cart'); 

        // $cart = session()->get('cart', []);
        // return view('rental.cart', compact('cart'));
    }

    // Tambah ke Keranjang dari Halaman Detail
    public function addToCart(Request $request)
    {
        $variant = ProductVariant::with('product')->findOrFail($request->variant_id);
        $cart = session()->get('cart', []);

        // Gunakan fallback jika tanggal kosong agar tidak 1970
        $startDate = $request->start_date ?: now()->format('Y-m-d H:i');
        $endDate = $request->end_date ?: now()->addDay()->format('Y-m-d H:i');

        // Buat key yang lebih solid dengan format timestamp
        $cartKey = $variant->id . '_' . strtotime($startDate) . '_' . strtotime($endDate);

        if(isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += $request->quantity;
        } else {
            $cart[$cartKey] = [
                "name" => $variant->product->nama_alat,
                "variant_name" => $variant->size,
                "quantity" => $request->quantity,
                "price" => $variant->harga_per_hari,
                "image" => $variant->product->image,
                "variant_id" => $variant->id,
                "start_date" => $startDate, // Ini yang akan diparsing di view cart
                "end_date" => $endDate
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Produk masuk keranjang!');
    }

    // Update Jumlah (Tambah/Kurang) di Halaman Keranjang
    public function updateCart(Request $request, $id)
    {
        $cart = session()->get('cart');
        
        // 1. Cek apakah key ID ini (misal: 12_17387...) ada di session
        if (isset($cart[$id])) {
            
            // 2. Ambil variant_id aslinya dari dalam data session untuk cek stok di DB
            $variantIdOriginal = $cart[$id]['variant_id'];
            $variant = ProductVariant::find($variantIdOriginal);

            if ($request->action == 'increase') {
                // Cek stok asli di database
                if ($variant && $cart[$id]['quantity'] < $variant->stok_total) {
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