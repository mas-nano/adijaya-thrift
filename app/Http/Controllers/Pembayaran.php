<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran as Bayar;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class Pembayaran extends Controller
{
    public function index(Bayar $pembayaran)
    {
        if(session('dataUser')){
            $res = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
            $prov = json_decode($res->getBody(), true);
            if($pembayaran->metode_bayar=='transfer'){
                return view('bayar',[
                    "css" => "bayar",
                    "title" => "Bayar",
                    "data" => $pembayaran,
                    "prov" => $prov,
                    "produk" => $pembayaran->pemesanan->produk
                ]);
            }else{
                return view('bayarqr',[
                    "css" => "qr",
                    "title" => "Bayar",
                    "data" => $pembayaran,
                    "prov" => $prov,
                    "produk" => $pembayaran->pemesanan->produk
                ]);
            }
        }else{
            return redirect()->to('/login')->send();
        }
    }
    public function update(Bayar $pembayaran, Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nama_bank' => ['required'],
            'nomor_rekening' => ['required', 'numeric'],
            'nama' => ['required'],
            'alamat' => ['required'],
            'provinsi' => ['required'],
            'kota' => ['required']
        ]);
        
        if($validate->fails()) {
            $res = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
            $prov = json_decode($res->getBody(), true);
            if($pembayaran->metode_bayar=='transfer'){
                return view('bayar',[
                    "css" => "bayar",
                    "title" => "Bayar",
                    "data" => $pembayaran,
                    "prov" => $prov,
                    "produk" => $pembayaran->pemesanan->produk,
                    "error" => json_decode($validate->errors(),true)
                ]);
            }else{
                return view('bayarqr',[
                    "css" => "qr",
                    "title" => "Bayar",
                    "data" => $pembayaran,
                    "prov" => $prov,
                    "produk" => $pembayaran->pemesanan->produk,
                    "error" => json_decode($validate->errors(),true)
                ]);
            }
        }
        $request['stok'] = $request['stok']-1;
        $request['status_pembeli'] = 'Konfirmasi admin';
        $request['status_admin'] = 'Belum Dikonfirmasi';
        try{
            $pembayaran->update($request->except(['_token', 'produk_id', 'aksi']));
            $pembayaran->pemesanan->produk->update($request->only(['stok']));
            $pembayaran->pemesanan->update($request->only(['status_pembeli', 'status_admin']));
            if($tawar = $pembayaran->pemesanan->produk->produk->where('user_id', session('dataUser')['id'])->all()){
                foreach($tawar as $t){
                    $t->delete();
                }
            }
            return redirect()->to('/riwayat')->send();
        }catch(QueryException $e){
            return $e->errorInfo;
        }
    }
}
