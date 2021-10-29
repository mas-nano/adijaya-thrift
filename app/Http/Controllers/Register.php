<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Register extends Controller
{
    public function index()
    {
        return view('daftar',[
            "css" => "register",
            "title" => "Daftar"
        ]);
    }
    public function create(Request $request)
    {
        $data = $request->all();
        $res = Http::acceptJson()->post('http://127.0.0.1:8001/api/user', $data);
        $res_json = json_decode($res->getBody(), true);
        if($res_json['messages']=='Gagal'){
            $request->session()->flash('data', $res_json['data']);
            $data['css'] = "register";
            $data['title'] = "Daftar";
            return view('daftar',$data);
        }else{
            return redirect()->to('/login')->send();
        }
    }
}
