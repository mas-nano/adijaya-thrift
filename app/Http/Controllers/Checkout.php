<?php

namespace App\Http\Controllers;

use App\Models\Tawar;
use App\Models\Produk;
use App\Models\Pemesanan;
use App\Models\Pembayaran;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class Checkout extends Controller
{
    public function index(Produk $produk)
    {
        if(session('dataUser')){
            $tawar = Tawar::where('user_id', session('dataUser')['id'])->where('produk_id', $produk->id)->where('status','Diterima')->latest()->first();
            return view('checkout',[
                "css" => "checkout",
                "title" => "Checkout",
                "produk" => json_decode($produk, true),
                "tawar" => $tawar
            ]);
        }
        return redirect()->secure('/login')->send();
    }
    public function store(Produk $produk, Request $request)
    {
        if(session('dataUser')){
            if(is_null($request->aksi)){
                return view('panduan',[
                    "css" => "panduan",
                    "title" => "Panduan",
                    "produk" => json_decode($produk, true),
                    "data" => $request->all()
                ]);
            }else{
                $dataBayar = $request->except(['_token', 'aksi']);
                $dataBayar['tanggal'] = date('Y-m-d');
                if($pemesanan = Pemesanan::where('user_id', session('dataUser')['id'])->where('produk_id', $produk['id'])->where('status_pembeli', 'Menunggu Pembayaran')->first()){
                    return redirect()->secure('/pembayaran/'.$pemesanan->pembayaran_id)->send();
                }
                try {
                    $pembayaran = Pembayaran::create($dataBayar);
                } catch (QueryException $e) {
                    return $e->errorInfo;
                }
                if($request->metode_bayar=="cod"){
                    $data = [
                        'pembayaran_id' => $pembayaran['id'],
                        'produk_id' => intval($produk['id']),
                        'user_id' => intval(session('dataUser')['id']),
                        'penjual_id' => intval($produk['id_penjual']),
                        'status_pembeli' => 'Proses',
                        'status_kirim' => 'Sudah dikirim',
                        'status_terima' => 'Belum diterima'
                    ];
                    $notif = [
                        'user_id'=>$produk->id_penjual,
                        'subjudul'=>session('dataUser')['nama'],
                        'pesan'=>'Melakukan transaksi COD untuk '.$produk->nama_produk,
                        'destinasi'=>'riwayat-penjualan'
                    ];
                    $stok = $produk->stok;
                    try {
                        Notification::create($notif);
                        $produk->update(['stok'=>$stok-1]);
                    } catch (QueryException $e) {
                        return $e->errorInfo;
                    }
                }else{
                    $data = [
                        'pembayaran_id' => $pembayaran['id'],
                        'produk_id' => intval($produk['id']),
                        'user_id' => intval(session('dataUser')['id']),
                        'penjual_id' => intval($produk['id_penjual']),
                        'status_pembeli' => 'Menunggu Pembayaran'
                    ];
                }
                try {
                    Pemesanan::create($data);
                } catch (QueryException $e) {
                    return $e->errorInfo;
                }
                if($request->metode_bayar=="cod"){
                    return redirect()->secure('/riwayat')->send();
                }
                return redirect()->secure('/pembayaran/'.$pembayaran['id'])->send();
            }
        }
    }
}
