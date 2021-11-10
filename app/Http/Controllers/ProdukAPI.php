<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProdukAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get($take)
    {
        try{
            $data = json_decode(Produk::filter(request(['search', 'daerah', 'kategori', 'sort', 'promo', 'min', 'max']))->where('stok', '>', 0)->take($take)->get(), true);
            for($i=0;$i<count($data);$i++){
                $data[$i]['harga']=number_format($data[$i]['harga'],0,',','.');
                if($data[$i]['promo']!=null){
                    $data[$i]['promo']=number_format($data[$i]['promo'],0,',','.');
                }
            }
            return response()->json($data, Response::HTTP_OK);
        }catch(QueryException $e){
            return $e->errorInfo;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if($request['take']){
            $produk = json_decode(Produk::filter(request(['search', 'daerah', 'kategori', 'sort', 'promo', 'min', 'max']))->take($request['take'])->get());
            for($i=0;$i<count($produk);$i++){
                $produk[$i]->harga=number_format($produk[$i]->harga,0,',','.');
            }
            return response()->json($produk, Response::HTTP_OK);
        }else{
            return response()->json([
                'message' => 'Masukkan parameter "take"'
            ],Response::HTTP_BAD_REQUEST);
        }
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
        //
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
