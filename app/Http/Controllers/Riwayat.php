<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Penarikan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Riwayat extends Controller
{
    public function index()
    {
        return view('riwayat-penjualan',[
            "css" => "riwayat-penjualan",
            "title" => "Riwayat Penjualan",
            "riwayat" => Pemesanan::where('penjual_id', session('dataUser')['id'])->get(),
            "i" => 0
        ]);
    }
    public function search(Request $request)
    {
        $pesanan = Pemesanan::where('penjual_id', $request['user_id']);
        if(isset($request['filter'])){
            $pesanan->where('status_terima', $request['filter']);
        }
        $pesanan = $pesanan->get();
        foreach ($pesanan as $p) {
            $p->produk;
        }
        return response()->json($pesanan);
    }
    public function ajukan(Request $request)
    {
        $request['tanggal'] = date('Y-m-d');
        try {
            Penarikan::create($request->only(['pemesanan_id', 'tanggal']));
            Pemesanan::where('id', $request->pemesanan_id)->update($request->only('status_ajukan'));
            return response()->json([
                'message' => 'Berhasil'
            ], Response::HTTP_OK);
        } catch (QueryException $e) {
            return $e->errorInfo;
        } 
    }
}
