<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminLogin extends Controller
{
    public function login()
    {
        if(session('dataAdmin')){
            redirect()->to("admin/dashboard")->send();
        }
        return view('admin-login',[
            "title" => "Login"
        ]);
    }
    public function postLogin(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'password' => ['required'],
            'username' => ['required']
        ]);
        
        if($validate->fails()) {
            return view('admin-login',[
                "title" => "Login",
                "data" => 'salah'
            ]);
        }
        $user =Admin::where('username', $request->username)->first();
        if($user){
            if(password_verify($request->password, $user->password)){
                $data = [
                    'nama' => $user->name,
                    'id' => $user->id,
                    'username' => $user->username
                ];
                $request->session()->put('dataAdmin', $data);
                return redirect()->to('admin/dashboard')->send();
            }
        }
        return view('admin-login',[
            "title" => "Login",
            "data" => 'salah'
        ]);
    }
}
