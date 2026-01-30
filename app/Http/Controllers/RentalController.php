<?php

namespace App\Http\Controllers;

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
}