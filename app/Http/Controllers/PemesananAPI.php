<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Pemesanan;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class PemesananAPI extends Controller
{
    public function index(Request $request)
    {
        if(isset($request['user_id'])){
            $query = Pemesanan::where('user_id', $request['user_id']);
            if(isset($request['filter'])){
                $query->where('status_pembeli', $request['filter']);
            }
            $query = $query->get();
            foreach ($query as $q) {
                $q->produk;
                $q->pembayaran;
            }
            return response()->json([
                'status'=>200,
                "pemesanan"=>$query
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                'status'=>400,
                'message' => 'masukkan parameter user_id'
            ], Response::HTTP_BAD_REQUEST);           
        }
    }
    public function getPemesanan(Pemesanan $pemesanan)
    {
        $pemesanan->produk;
        $pemesanan->pembayaran;
        return response()->json([
            'status'=>200,
            'pemesanan'=>$pemesanan
        ], Response::HTTP_OK);
    }
    public function postPemesanan(Pemesanan $pemesanan, Request $request)
    {
        $validate = Validator::make($request->all(), [
            'review' => ['required'],
            'rating' => ['required']
        ]);
        if($validate->fails()) {
            return response()->json([
                'status'=>400,
                'error'=>$validate->errors()
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
            $request['user_id'] = $pemesanan->user_id;
            $request['penjual_id'] = $pemesanan->penjual_id;
            $request['produk_id'] = $pemesanan->produk_id;
            Review::create($request->except(['status_terima', 'status_pembeli']));
            Notification::create($notif);
            return response()->json([
                'status'=>200,
                'message'=>'Berhasil'
            ]);
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
}
