<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Toko extends Controller
{
    public function index(Request $request, $id_toko)
    {
        $data = $request->all();
        if(isset($data['produk'])){
            return view('toko-produk',[
                "css" => "profilToko-review",
                "title" => "Aulia Dewi",
                "id_toko" => $id_toko,
                "data" => $data
            ]);
        }
        return view('toko',[
            "css" => "profilToko-review",
            "title" => "Aulia Dewi",
            "id_toko" => $id_toko,
            "data" => $data
        ]);
    }
}
