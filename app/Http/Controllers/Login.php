<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

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
        $validate = Validator::make($request->all(), [
            'password' => ['required'],
            'username' => ['required']
        ]);
        
        if($validate->fails()) {
            return view('login',[
                "css" => "login",
                "title" => "Masuk",
                "data" => json_decode($validate->errors(), true)
            ]);
        }

        $data = $request->all();
        $users =User::where('username', $data['username'])->get();
        if(count($users)===1){
            if(password_verify($data['password'], $users[0]['password'])){
                $data = [
                    'nama' => $users[0]['name'],
                    'id' => $users[0]['id'],
                    'email' => $users[0]['email'],
                    'username' => $users[0]['username'],
                    'gambar' => $users[0]['photo']
                ];
                $request->session()->put('dataUser', $data);
                return redirect()->to('/')->secure()->send();
            }
        }
        return view('login',[
            "css" => "login",
            "title" => "Masuk",
            "message" => "Nama pengguna atau Kata Sandi Salah!"
        ]);  
    }
}
