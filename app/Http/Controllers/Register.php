<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

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
        $validate = Validator::make($request->all(), [
            'password' => ['required', 'min:8'],
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'unique:users,username']
        ]);
        
        if($validate->fails()) {
            return view('daftar',[
                "css" => "register",
                "title" => "Daftar",
                "data" => json_decode($validate->errors(),true)
            ]);
        }

        $data = $request->all();
        $data['photo'] = 'default.jpg';
        $data['password'] = password_hash($request->password, PASSWORD_DEFAULT);

        try {
            $user = User::create($data);
            return redirect()->to('/login')->send();
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
}
