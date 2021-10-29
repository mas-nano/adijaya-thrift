<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Login extends Controller
{
    public function index()
    {
        return view('login',[
            "css" => "login",
            "title" => "Masuk"
        ]);
    }
    public function login(Request $request)
    {
        $data = $request->all();
        $res = Http::acceptJson()->post('http://127.0.0.1:8001/api/login', $data);
        $res_json = json_decode($res->getBody(), true);
        if($res_json['message']!='Sukses'){
            $request->session()->flash('login', $res_json['message']);
            $data['css'] = "login";
            $data['title'] = "Masuk";
            return view('login',$data);
        }else{
            return redirect()->to('/home')->send();
        }
    }
}
