<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class Pesanan extends Controller
{
    public function index()
    {
        return view('pesanan-masuk',[
            "css" => "pesanan-masuk",
            "title" => "Pesanan Masuk",
            "pemesanan" => Pemesanan::where('penjual_id', session('dataUser')['id'])->get(),
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
