<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class AdminProduk extends Controller
{
    public function index(Request $request)
    {
        return view('admin-produkList',[
            "title" => "Produk",
            "produk" => Produk::where('id', $request->search)->orWhere('nama_produk', 'like', '%'.$request->search.'%')->get()
        ]);
    
    }
    public function ubah(Produk $produk)
    {
        return view('admin-kelolaProduk',[
            "title" => "Produk",
            "produk" => $produk
        ]);
    }
    public function postUbah(Produk $produk, Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nama_produk' => ['required'],
            'kategori' => ['required'],
            'deskripsi' => ['required'],
            'harga' => ['required', 'numeric'],
        ]);
        if($validate->fails()) {
            return view('admin-kelolaProduk',[
                "title" => "Produk",
                "data" => json_decode($validate->errors()),
                "produk" => $produk
            ]);
        }
        try {
            $produk->update($request->all());
            return redirect()->to("/admin/produk")->send();
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
    public function hapus(Produk $produk)
    {
        try {
            $produk->delete();
            return response()->json([
                'message' => 'Sukses'
            ], Response::HTTP_OK);
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
}
