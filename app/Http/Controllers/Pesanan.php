<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pemesanan;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class Pesanan extends Controller
{
    public function index()
    {
        if(!session('dataUser')){
            return redirect()->secure('/login')->send();
        }
        if(!User::find(session('dataUser')['id'])->lengkap){
            return redirect()->secure('/akun')->send();
        }
        try {
            Notification::where('user_id', session('dataUser')['id'])->where('destinasi', 'pesanan-masuk')->delete();
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
        return view('pesanan-masuk',[
            "css" => "pesanan-masuk",
            "title" => "Pesanan Masuk",
            "pemesanan" => Pemesanan::where('penjual_id', session('dataUser')['id'])->get(),
            "i" => 1,
            "rating" => floor(User::findOrFail(session('dataUser')['id'])->review->avg('rating'))
        ]);
    }
    public function search(Request $request)
    {
        $pesanan = Pemesanan::where('penjual_id', $request['user_id']);
        if(isset($request['filter'])){
            $pesanan->where('status_kirim', $request['filter']);
        }
        $pesanan = $pesanan->get();
        foreach ($pesanan as $p) {
            $p->produk;
            $p->produk->url = app('firebase.storage')->getBucket()->object("img/produk/".$p->produk->foto)->signedUrl(new \DateTime('tomorrow'));
        }
        return response()->json($pesanan);
    } 
}
