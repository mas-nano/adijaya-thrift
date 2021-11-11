<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
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
    public function listAdmin()
    {
        if(!session('dataAdmin')){
            redirect()->to("admin")->send();
        }
        return view('admin-list',[
            "title" => "Admin",
            "admin" => Admin::all(),
            "i" => 0
        ]);
    }
    public function tambahAdmin()
    {
        if(!session('dataAdmin')){
            redirect()->to("admin")->send();
        }
        return view('admin-kelolaAdmin',[
            "title" => "Tambah Admin",
            "aksi" => 'tambah-admin'
        ]);
    }
    public function postTambahAdmin(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'password' => ['required', 'min:8'],
            'nama' => ['required'],
            'email' => ['required', 'email', 'unique:admins,email'],
            'username' => ['required', 'unique:admins,username'],
            'id_admin' => ['required', 'unique:admins,id_admin']
        ]);
        
        if($validate->fails()) {
            return view('admin-kelolaAdmin',[
                "title" => "Tambah Admin",
                "aksi" => 'tambah-admin',
                "data" => json_decode($validate->errors())
            ]);
        }

        $request['password'] = password_hash($request->password, PASSWORD_DEFAULT);

        try {
            $user = Admin::create($request->all());
            return redirect()->to('admin/admin')->send();
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
}
