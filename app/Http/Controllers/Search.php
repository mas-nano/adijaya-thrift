<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\QueryException;

class Search extends Controller
{
    public function index()
    {
        $res = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
        $res_json = json_decode($res->getBody(), true);
        return view('cari',[
            "css" => "cari",
            "title" => "Produk",
            "data" => $res_json
        ]);
    }
    public function search($take)
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
}
