<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Home extends Controller
{
    public function index()
    {
        $produk = Produk::where('stok', '>', 0)->take(6)->get();
        if(session('dataUser')){
            if(!is_null($kategori = User::find(session('dataUser')['id'])->pemesanan->last())){
                if($kategori = User::find(session('dataUser')['id'])->pemesanan->last()->produk->kategori){
                    if(!$produk = Produk::where('kategori', $kategori)->where('stok', '>', 0)->take(6)->get()){
                        $produk = Produk::where('stok', '>', 0)->take(6)->get();
                    }
                }
            }
        }
        return view('home', [
            'title' => 'Beranda',
            'css' => 'home',
            'produk' => $produk
        ]);
    }
    public function more($take)
    {
        $produk = Produk::where('stok', '>', 0)->take($take)->get();
        if(session('dataUser')){
            if($kategori = User::find(session('dataUser')['id'])->pemesanan->last()->produk->kategori){
                if(!$produk = Produk::where('kategori', $kategori)->where('stok', '>', 0)->take($take)->get()){
                    $produk = Produk::where('stok', '>', 0)->take($take)->get();
                }
            }
        }
        return response()->json($produk, Response::HTTP_OK);
    }
}
