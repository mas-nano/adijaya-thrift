<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('upload',[
            "css" => "upload",
            "title" => "Tambah Produk"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function produkToko()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($request->promo)){
            $validate = Validator::make($request->all(), [
                'nama_produk' => ['required'],
                'kategori' => ['required'],
                'deskripsi' => ['required'],
                'harga' => ['required', 'numeric'],
                'foto' => ['required'],
                'promo' => ['lt:harga']
            ]);
        }else{
            $validate = Validator::make($request->all(), [
                'nama_produk' => ['required'],
                'kategori' => ['required'],
                'deskripsi' => ['required'],
                'harga' => ['required', 'numeric'],
                'foto' => ['required']
            ]);
        }
        
        if($validate->fails()) {
            return view('upload',[
                "css" => "upload",
                "title" => "Tambah Produk",
                "message" => json_decode($validate->errors(),true)
            ]);
        }

        $data = $request->all();
        $data['id_penjual'] = session('dataUser')['id'];
        if($request->hasfile('foto'))
        {
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension();
            $eksGambar = ['jpeg', 'jpg', 'png', 'JPEG', 'JPG', 'PNG'];
            if(!in_array($extention, $eksGambar)){
                return view('upload',[
                    "css" => "upload",
                    "title" => "Tambah Produk",
                    "gambar" => "File bukan gambar"
                ]);
            }
            $filename = time().'.'.$extention;
            $file->move('assets/img/uploads/produk/', $filename);
            $data["foto"] = $filename;
        }

        try {
            $user = Produk::create($data);
            return redirect()->to('/produk-toko')->send();
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        return view('upload',[
            "css" => "upload",
            "title" => "Ubah Produk",
            "data" => json_decode($produk,true)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        if(isset($request->promo)){
            $validate = Validator::make($request->all(), [
                'nama_produk' => ['required'],
                'kategori' => ['required'],
                'deskripsi' => ['required'],
                'harga' => ['required', 'numeric'],
                'promo' => ['lt:harga']
            ]);
        }else{
            $validate = Validator::make($request->all(), [
                'nama_produk' => ['required'],
                'kategori' => ['required'],
                'deskripsi' => ['required'],
                'harga' => ['required', 'numeric']
            ]);
        }
        
        if($validate->fails()) {
            return view('upload',[
                "css" => "upload",
                "title" => "Ubah Produk",
                "message" => json_decode($validate->errors(),true),
                "data" => json_decode($produk,true)
            ]);
        }

        $data = $request->all();
        unset($data["_token"]);
        unset($data["simpan"]);
        $data['id_penjual'] = session('dataUser')['id'];
        if($request->hasfile('foto'))
        {
            $destination = 'assets/img/uploads/profile_images/'.$produk->foto;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension();
            $eksGambar = ['jpeg', 'jpg', 'png'];
            if(!in_array($extention, $eksGambar)){
                return view('upload',[
                    "css" => "upload",
                    "title" => "Tambah Produk",
                    "gambar" => "File bukan gambar",
                    "data" => json_decode($produk,true)
                ]);
            }
            $filename = time().'.'.$extention;
            $file->move('assets/img/uploads/produk/', $filename);
            $data["foto"] = $filename;
        }

        try {
            Produk::where('id', $produk['id'])->update($data);
            return redirect()->to('/produk-toko')->send();
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
