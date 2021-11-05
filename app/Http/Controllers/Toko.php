<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class Toko extends Controller
{
    public function index(Request $request, User $user)
    {
        $data = $request->all();
        if(isset($data['produk'])){
            $produk = Produk::where('id_penjual', $user['id'])->get();
            return view('toko-produk',[
                "css" => "profilToko-review",
                "title" => $user['name'],
                "data" => json_decode($user, true),
                "produk" => json_decode($produk, true)
            ]);
        }
        return view('toko',[
            "css" => "profilToko-review",
            "title" => $user['name'],
            "data" => json_decode($user, true)
        ]);
    }
}
