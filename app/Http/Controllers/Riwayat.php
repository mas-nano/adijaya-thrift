<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use App\Models\Pemesanan;
use App\Models\Penarikan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;

class Riwayat extends Controller
{
    public function index()
    {
        if(!session('dataUser')){
            return redirect()->to('/login')->send();
        }
        if(!User::find(session('dataUser')['id'])->lengkap){
            return redirect()->to('/akun')->send();
        }
        try {
            Notification::where('user_id', session('dataUser')['id'])->where('destinasi', 'riwayat-penjualan')->delete();
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
        return view('riwayat-penjualan',[
            "css" => "riwayat-penjualan",
            "title" => "Riwayat Penjualan",
            "riwayat" => Pemesanan::where('penjual_id', session('dataUser')['id'])->get(),
            "i" => 0,
            "rating" => floor(User::findOrFail(session('dataUser')['id'])->review->avg('rating'))
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
        $request['tgl_ajukan'] = date('Y-m-d');
        try {
            Penarikan::create($request->only(['pemesanan_id', 'tgl_ajukan']));
            Pemesanan::where('id', $request->pemesanan_id)->update($request->only('status_ajukan'));
            return response()->json([
                'message' => 'Berhasil'
            ], Response::HTTP_OK);
        } catch (QueryException $e) {
            return $e->errorInfo;
        } 
    }
    public function pembeli()
    {
        if(!session('dataUser')){
            return redirect()->to('/login')->send();
        }
        try {
            Notification::where('user_id', session('dataUser')['id'])->where('destinasi', 'riwayat')->delete();
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
        return view('pemesanan',[
            "css" => "pemesanan",
            "title" => "Riwayat",
            "rating" => floor(User::findOrFail(session('dataUser')['id'])->review->avg('rating'))
        ]);
    }
}
