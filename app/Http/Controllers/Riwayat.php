<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tawar;
use App\Models\Pemesanan;
use App\Models\Penarikan;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;

class Riwayat extends Controller
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
            $p->produk->url = app('firebase.storage')->getBucket()->object("img/produk/".$p->produk->foto)->signedUrl(new \DateTime('tomorrow'));
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
            return redirect()->secure('/login')->send();
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
    public function penawaran(Request $request)
    {
        if(isset($request['user_id'])){
            $query = Tawar::where('user_id', $request['user_id']);
            if(isset($request['filter'])){
                $query->where('status', $request['filter']);
            }
            $query = $query->get();
            foreach($query as $q){
                $q->produk;
                $q->produk->url = app('firebase.storage')->getBucket()->object("img/produk/".$q->produk->foto)->signedUrl(new \DateTime('tomorrow'));
            }
            return response()->json([
                'tawar' => $query
            ], Response::HTTP_OK);
        }
        return response()->json([
            'message' => 'masukkan parameter user_id atau penjual_id'
        ], Response::HTTP_BAD_REQUEST);
    }
    public function pemesanan(Request $request)
    {
        if(isset($request['user_id'])){
            $query = Pemesanan::where('user_id', $request['user_id']);
            if(isset($request['filter'])){
                $query->where('status_pembeli', $request['filter']);
            }
            $query = $query->get();
            $bayar = [];
            $produk = [];
            $pemesanan_id = [];
            $status = [];
            for($i=0;$i<count($query);$i++){
                $query[$i]->produk->url = app('firebase.storage')->getBucket()->object("img/produk/".$query[$i]->produk->foto)->signedUrl(new \DateTime('tomorrow'));
                array_push($bayar, $query[$i]->pembayaran);
                array_push($produk, $query[$i]->produk);
                array_push($pemesanan_id, $query[$i]->id);
                array_push($status, $query[$i]->status_pembeli);
            }
            return response()->json([
                "bayar"=>$bayar, 
                "produk"=>$produk,
                "pemesanan_id"=>$pemesanan_id,
                "status_pembeli" => $status
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                'message' => 'masukkan parameter user_id'
            ], Response::HTTP_BAD_REQUEST);           
        }
    }
}
