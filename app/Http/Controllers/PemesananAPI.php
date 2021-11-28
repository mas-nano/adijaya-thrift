<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
            $bayar = [];
            $produk = [];
            $pemesanan_id = [];
            $status = [];
            for($i=0;$i<count($query);$i++){
                array_push($bayar, $query[$i]->pembayaran);
                array_push($produk, $query[$i]->produk);
                array_push($pemesanan_id, $query[$i]->id);
                array_push($status, $query[$i]->status_pembeli);
            }
            return response()->json([
                'status'=>200,
                "bayar"=>$bayar, 
                "produk"=>$produk,
                "pemesanan_id"=>$pemesanan_id,
                "status_pembeli" => $status
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                'status'=>400,
                'message' => 'masukkan parameter user_id'
            ], Response::HTTP_BAD_REQUEST);           
        }
    }
}
