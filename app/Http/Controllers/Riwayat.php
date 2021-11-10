<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class Riwayat extends Controller
{
    public function index()
    {
        return view('riwayat-penjualan',[
            "css" => "riwayat-penjualan",
            "title" => "Riwayat Penjualan",
            "riwayat" => Pemesanan::where('penjual_id', session('dataUser')['id'])->where('status_penjual', 'Sudah dikirim')->orWhere('status_penjual', 'Selesai')->orWhere('status_penjual', 'Sudah dicairkan')->get(),
            "i" => 0
        ]);
    }
    public function search(Request $request)
    {
        $pesanan = Pemesanan::where('penjual_id', $request['user_id']);
        if(isset($request['filter'])){
            $pesanan->where('status_penjual', $request['filter']);
        }
        $pesanan = $pesanan->get();
        foreach ($pesanan as $p) {
            $p->produk;
        }
        return response()->json($pesanan);
    } 
}
