<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailPesan extends Controller
{
    public function index(Request $request)
    {
        $data = $request->all();
        if(isset($data['s'])){
            return view('detail-pemesanan',[
                "css" => "detail-pemesanan",
                "title" => "Detail Pemesanan",
                "data" => $data
            ]);
        }else{
            return redirect()->to('/riwayat')->send();
        }
    }
}
