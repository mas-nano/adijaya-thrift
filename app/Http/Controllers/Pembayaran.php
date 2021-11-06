<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran as Bayar;
use Illuminate\Support\Facades\Http;

class Pembayaran extends Controller
{
    public function index(Bayar $pembayaran)
    {
        
        if($pembayaran->metode_bayar=='transfer'){
            $res = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
            $prov = json_decode($res->getBody(), true);
            return view('bayar',[
                "css" => "bayar",
                "title" => "Bayar",
                "data" => $pembayaran,
                "prov" => $prov
            ]);
        }
    }
}
