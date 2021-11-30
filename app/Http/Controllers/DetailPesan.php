<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Pemesanan;
use App\Models\Review;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            return redirect()->secure('/login')->send();
        }
            
    }
    public function update(Pemesanan $pemesanan, Request $request)
    {
        if(isset($request['kirim'])){
            $request['status_kirim'] = 'Sudah dikirim';
            $request['status_terima'] = 'Belum diterima';
            $request['status_pembeli'] = 'Proses';
            $notif['user_id'] = $pemesanan->user_id;
            $notif['subjudul'] = $pemesanan->produk->nama_produk;
            $notif['pesan'] = $pemesanan->produk->nama_produk.' dalam proses pengiriman';
            $notif['destinasi'] = 'riwayat';
            try {
                $pemesanan->update($request->all());
                Notification::create($notif);
            } catch (QueryException $e) {
                return $e->errorInfo;
            }
            return redirect()->secure('/pesanan-masuk')->send();
        }
        if(isset($request['terima'])){
            $validate = Validator::make($request->all(), [
                'review' => ['required'],
                'rating' => ['required']
            ]);
            if($validate->fails()) {
                return view('detail-pemesanan',[
                    "css" => "detail-pemesanan",
                    "title" => "Detail Pemesanan",
                    "data" => $pemesanan,
                    "error" => json_decode($validate->errors(), true)
                ]);
            }
            $request['status_terima'] = 'Selesai';
            $request['status_pembeli'] = 'Selesai';
            $notif['user_id'] = $pemesanan->penjual_id;
            $notif['subjudul'] = $pemesanan->produk->nama_produk;
            $notif['pesan'] = $pemesanan->produk->nama_produk.' sudah diterima '.$pemesanan->pembeli->name;
            $notif['destinasi'] = 'riwayat-penjualan';
            try {
                $pemesanan->update($request->except(['review', 'rating']));
                $request['user_id'] = session('dataUser')['id'];
                $request['penjual_id'] = $pemesanan->penjual_id;
                $request['produk_id'] = $pemesanan->produk_id;
                Review::create($request->except(['status_terima', 'status_pembeli']));
                Notification::create($notif);
            } catch (QueryException $e) {
                return $e->errorInfo;
            }
            return redirect()->secure('/riwayat')->send();
        }
    }
}
