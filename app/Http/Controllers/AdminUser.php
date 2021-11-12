<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class AdminUser extends Controller
{
    public function listUser(Request $request)
    {
        if(!session('dataAdmin')){
            redirect()->to("admin")->send();
        }
        return view('admin-penggunaList',[
            "title" => "Pengguna",
            "user" => User::where('name', 'like', '%'.$request->search.'%')->orWhere('username', $request->search)->get(),
        ]);
    }
    public function ubahUser(User $user)
    {
        if(!session('dataAdmin')){
            redirect()->to("admin")->send();
        }
        $res = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
        $prov = json_decode($res->getBody(), true);
        return view('admin-kelolaAdmin',[
            "title" => "Pengguna",
            "aksi" => 'ubah-user',
            "user" => $user,
            "prov" => $prov
        ]);
    }
    public function postUbahUser(User $user, Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'username' => ['required']
        ]);
        if($validate->fails()) {
            $res = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
            $prov = json_decode($res->getBody(), true);
            return view('admin-kelolaAdmin',[
                "title" => "Pengguna",
                "user" => $user,
                "aksi" => 'ubah-user',
                "data" => json_decode($validate->errors(),true),
                "prov" => $prov
            ]);
        }
        if(isset($request->password)){
            $request['password'] = password_hash($request->password, PASSWORD_DEFAULT);
        }
        if($request->hasfile('photo')){
            $destination = 'img/uploads/profile_images/'.$user->photo;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('photo');
            $extention = $file->getClientOriginalExtension();
            $eksGambar = ['jpeg', 'jpg', 'png'];
            if(!in_array($extention, $eksGambar)){
                $res = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
                $prov = json_decode($res->getBody(), true);
                return view('admin-kelolaAdmin',[
                    "title" => "Pengguna",
                    "user" => $user,
                    "aksi" => 'ubah-user',
                    "gambar" => "File bukan gambar",
                    "prov" => $prov
                ]);
            }
            $filename = time().'.'.$extention;
            $file->move('img/uploads/profile_images/', $filename);
            $data["photo"] = $filename;
        }
        try {
            if(isset($request->password)){
                $user->update($request->all());
            }else{
                $user->update($request->except('password'));
            }
            return redirect()->to('admin/pengguna')->send();
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
    public function tambahUser()
    {
        if(!session('dataAdmin')){
            redirect()->to("admin")->send();
        }
        return view('admin-kelolaAdmin',[
            "title" => "Pengguna",
            "aksi" => 'tambah-user'
        ]);
    }
    public function postTambahUser(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'password' => ['required', 'min:8'],
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'unique:users,username'],
            'tel' => ['required', 'numeric']
        ]);
        
        if($validate->fails()) {
            return view('admin-kelolaAdmin',[
                "title" => "Pengguna",
                "aksi" => 'tambah-user',
                "data" => json_decode($validate->errors())
            ]);
        }

        $request['password'] = password_hash($request->password, PASSWORD_DEFAULT);
        $request['photo'] ='default.png';
        try {
            $user = User::create($request->all());
            return redirect()->to('admin/pengguna')->send();
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
    public function hapusUser(User $user)
    {
        try {
            $user->delete();
            return response()->json([
                'message' => 'Sukses'
            ], Response::HTTP_OK);
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
}
