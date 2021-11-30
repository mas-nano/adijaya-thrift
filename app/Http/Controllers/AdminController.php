<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function listAdmin(Request $request)
    {
        if(!session('dataAdmin')){
            redirect()->secure("admin")->send();
        }
        return view('admin-list',[
            "title" => "Admin",
            "admin" => Admin::where('nama', 'like', '%'.$request->search.'%')->orWhere('id_admin', $request->search)->get(),
        ]);
    }
    public function tambahAdmin()
    {
        if(!session('dataAdmin')){
            redirect()->secure("admin")->send();
        }
        return view('admin-kelolaAdmin',[
            "title" => "Admin",
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
                "title" => "Admin",
                "aksi" => 'tambah-admin',
                "data" => json_decode($validate->errors())
            ]);
        }

        $request['password'] = password_hash($request->password, PASSWORD_DEFAULT);

        try {
            $user = Admin::create($request->all());
            return redirect()->secure('admin/admin')->send();
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
    public function ubahAdmin(Admin $admin)
    {
        if(!session('dataAdmin')){
            redirect()->secure("admin")->send();
        }
        return view('admin-kelolaAdmin',[
            "title" => "Admin",
            "aksi" => 'ubah-admin',
            "admin" => $admin
        ]);
    }
    public function postUbahAdmin(Admin $admin, Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nama' => ['required'],
            'email' => ['required', 'email'],
            'id_admin' => ['required']
        ]);
        if($validate->fails()) {
            return view('admin-kelolaAdmin',[
                "title" => "Admin",
                "aksi" => 'ubah-admin',
                "data" => json_decode($validate->errors()),
                "admin" => $admin
            ]);
        }
        if(isset($request->password)){
            $request['password'] = password_hash($request->password, PASSWORD_DEFAULT);
        }
        try {
            if(isset($request->password)){
                $admin->update($request->all());
            }else{
                $admin->update($request->except('password'));
            }
            return redirect()->secure("admin/admin")->send();
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
    public function hapusAdmin(Admin $admin)
    {
        if(!session('dataAdmin')){
            redirect()->secure("admin")->send();
        }
        try {
            $admin->delete();
            return response()->json([
                'message' => 'Sukses'
            ], Response::HTTP_OK);
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
}
