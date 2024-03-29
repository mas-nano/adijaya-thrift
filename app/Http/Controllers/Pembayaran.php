<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Pembayaran as Bayar;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class Pembayaran extends Controller
{
    public function index(Bayar $pembayaran)
    {
        if(session('dataUser')){
            $res = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');
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
            return redirect()->secure('/login')->send();
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
            $res = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');
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
        $request['status_pembeli'] = 'Konfirmasi admin';
        $request['status_admin'] = 'Belum Dikonfirmasi';
        try{
            $pembayaran->update($request->except(['_token', 'produk_id', 'aksi']));
            $pembayaran->pemesanan->update($request->only(['status_pembeli', 'status_admin']));
            if($tawar = $pembayaran->pemesanan->produk->produk->where('user_id', session('dataUser')['id'])->all()){
                foreach($tawar as $t){
                    $t->delete();
                }
            }
            return redirect()->secure('/riwayat')->send();
        }catch(QueryException $e){
            return $e->errorInfo;
        }
    }
    public function destroy(Bayar $pembayaran)
    {
        if($tawar = $pembayaran->pemesanan->produk->produk->where('user_id', session('dataUser')['id'])->all()){
            foreach($tawar as $t){
                $t->delete();
            }
        }
        $stok = $pembayaran->pemesanan->produk->stok;
        $pembayaran->pemesanan->produk->update(['stok', $stok+1]);
        $pembayaran->pemesanan->delete();
        $pembayaran->delete();
        return response()->json([
            'message' => 'Berhasil Dihapus'
        ], Response::HTTP_OK);
    }
}
