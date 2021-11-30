<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelolaAdmin extends Controller
{
    public function index(Request $request)
    {
        $data = $request->all();
        if(isset($data['s'])){
            if($data['s']=='tambah-admin'){
                return view('admin-kelolaAdmin',[
                    "title" => "Tambah Admin",
                    "data" => $data
                ]);
            }elseif($data['s']=='ubah-admin'){
                return view('admin-kelolaAdmin',[
                    "title" => "Ubah Admin",
                    "data" => $data
                ]);
            }elseif($data['s']=='tambah-user'){
                return view('admin-kelolaAdmin',[
                    "title" => "Tambah User",
                    "data" => $data
                ]);
            }elseif($data['s']=='ubah-user'){
                return view('admin-kelolaAdmin',[
                    "title" => "Ubah User",
                    "data" => $data
                ]);
            }
        }else{
            return redirect()->secure('/admin/admin')->send();
        }
    }
}
