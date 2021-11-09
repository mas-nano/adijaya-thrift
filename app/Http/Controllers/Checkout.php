<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pembayaran;
use App\Models\Pemesanan;
use App\Models\Tawar;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class Checkout extends Controller
{
    public function index(Produk $produk)
    {
        if(session('dataUser')){
            $tawar = Tawar::where('user_id', session('dataUser')['id'])->where('produk_id', $produk->id)->first();
            return view('checkout',[
                "css" => "checkout",
                "title" => "Checkout",
                "produk" => json_decode($produk, true),
                "tawar" => $tawar
            ]);
        }
        return redirect()->to('/login')->send();
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
                try {
                    $pembayaran = Pembayaran::create($dataBayar);
                } catch (QueryException $e) {
                    return $e->errorInfo;
                }
                $data = [
                    'pembayaran_id' => $pembayaran['id'],
                    'produk_id' => intval($produk['id']),
                    'user_id' => intval(session('dataUser')['id']),
                    'penjual_id' => intval($produk['id_penjual']),
                    'status_pembeli' => 'Menunggu Pembayaran'
                ];
                try {
                    $pemesanan = Pemesanan::create($data);
                } catch (QueryException $e) {
                    return $e->errorInfo;
                }
                return redirect()->to('/pembayaran/'.$pembayaran['id'])->send();
            }
        }
    }
}
