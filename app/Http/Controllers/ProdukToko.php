<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class ProdukToko extends Controller
{
    public function index()
    {
        $id = session('dataUser')['id'];
        $data = Produk::where('id_penjual', $id)->get();
        return view('produk-toko',[
            "css" => "produk-toko",
            "title" => "Produk Toko",
            "data" => json_decode($data, true)
        ]);
    }
    public function show(Produk $produk)
    {
        $data = User::findOrFail($produk->id_penjual);
        if(session('dataUser')){
            $wishlist = User::findOrFail(session('dataUser')['id']);
            if(isset($wishlist->wishlist->where('produk_id', $produk->id)->first()->id)){
                $id = $wishlist->wishlist->where('produk_id', $produk->id)->first()->id;
            }else{
                $id = false;
            }
        }
        return view('produk',[
            "css" => "produk",
            "title" => "Produk",
            "produk" => json_decode($produk, true),
            "data" => $data,
            "wishlist" => $id
        ]);
    }
}
