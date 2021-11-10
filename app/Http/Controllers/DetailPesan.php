<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class DetailPesan extends Controller
{
    public function index(Pemesanan $pemesanan, Request $request)
    {
        if(session('dataUser')){
            return view('detail-pemesanan',[
                "css" => "detail-pemesanan",
                "title" => "Detail Pemesanan",
                "data" => $pemesanan
            ]);
        }else{
            return redirect()->to('/login')->send();
        }
            
    }
    public function update(Pemesanan $pemesanan, Request $request)
    {
        if(isset($request['kirim'])){
            $request['status_penjual'] = 'Sudah dikirim';
            $request['status_pembeli'] = 'Proses';
            $pemesanan->update($request->all());
            return redirect()->to('/pesanan-masuk')->send();
        }
        if(isset($request['terima'])){
            $request['status_penjual'] = 'Selesai';
            $request['status_pembeli'] = 'Selesai';
            $pemesanan->update($request->except('review'));
            return redirect()->to('/riwayat')->send();
        }
    }
}
