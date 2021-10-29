<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Search extends Controller
{
    public function index(Request $request)
    {
        $res = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
        $res_json = json_decode($res->getBody(), true);
        if(count($request->all())<1){
            return view('cari',[
                "css" => "cari",
                "title" => "Produk",
                "data" => $res_json
            ]);
        }else{
            $data = $request->all();
            if(isset($data['promo'])){
                if($data['promo']=='true'){
                    return view('cari',[
                        "css" => "cari",
                        "title" => "Promo",
                        "data" => $res_json
                    ]);
                }
            }
            if(isset($data['s'])){
                return view('cari',[
                    "css" => "cari",
                    "title" => "Cari",
                    "data" => $res_json,
                    "res" => $data
                ]);
            }
        }
    }
}
