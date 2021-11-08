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
}
