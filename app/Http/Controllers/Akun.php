<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class Akun extends Controller
{
    public function index()
    {
        if(session('dataUser')){
            $res = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
            $prov = json_decode($res->getBody(), true);
            $id = session('dataUser')['id'];
            $data = User::where('id', $id)->get();
            return view('edit-akun',[
                "css" => "edit-akun",
                "title" => "Edit Akun",
                "data" => json_decode($data, true),
                "prov" => $prov
            ]);
        }else{
            return redirect()->to('/login')->send();
        }
    }
    public function update(Request $request)
    {
        $id = session('dataUser')['id'];
        $dataUser = json_decode(User::where('id', $id)->get(), true);
        $res = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
        $prov = json_decode($res->getBody(), true);
        $validate = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'username' => ['required']
        ]);
        if($validate->fails()) {
            return view('edit-akun',[
                "css" => "edit-akun",
                "title" => "Edit Akun",
                "data" => $dataUser,
                "message" => json_decode($validate->errors(),true),
                "prov" => $prov
            ]);
        }
        $data = $request->all();
        unset($data["_token"]);
        if(isset($data['password'])){
            $data['password'] = password_hash($request->password, PASSWORD_DEFAULT);
        }else{
            unset($data['password']);
        }
        if($request->hasfile('photo'))
        {
            $destination = 'img/uploads/profile_images/'.$dataUser[0]['photo'];
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('photo');
            $extention = $file->getClientOriginalExtension();
            $eksGambar = ['jpeg', 'jpg', 'png'];
            if(!in_array($extention, $eksGambar)){
                return view('edit-akun',[
                    "css" => "edit-akun",
                    "title" => "Edit Akun",
                    "data" => $dataUser,
                    "gambar" => "File bukan gambar",
                    "prov" => $prov
                ]);
            }
            $filename = time().'.'.$extention;
            $file->move('img/uploads/profile_images/', $filename);
            $data["photo"] = $filename;
        }
        try {
            $data['lengkap'] = 1;
            $user = User::where('id', session('dataUser')['id'])->update($data);
            $dataUser = User::where('id', $id)->get();
            $sesi = [
                'nama' => $dataUser[0]['name'],
                'id' => $dataUser[0]['id'],
                'email' => $dataUser[0]['email'],
                'username' => $dataUser[0]['username'],
                'gambar' => $dataUser[0]['photo']
            ];
            $request->session()->forget('dataUser');
            $request->session()->put('dataUser', $sesi);
            return view('edit-akun',[
                "css" => "edit-akun",
                "title" => "Edit Akun",
                "data" => json_decode($dataUser, true),
                "prov" => $prov
            ]);
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
}
