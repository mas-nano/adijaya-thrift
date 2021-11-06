<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Support\Facades\Http;

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
}
