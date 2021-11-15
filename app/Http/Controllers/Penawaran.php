<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tawar;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class Penawaran extends Controller
{
    public function index()
    {
        if(!session('dataUser')){
            return redirect()->to('/login')->send();
        }
        if(!User::find(session('dataUser')['id'])->lengkap){
            return redirect()->to('/akun')->send();
        }
        $query = Tawar::where('penjual_id', session('dataUser')['id'])->get();
        foreach($query as $q){
            $q->produk;
            $q->user;
        }
        return view('penawaran',[
            "css" => "penawaran",
            "title" => "Penawaran",
            "tawar" => $query,
            "i"=> 0,
            "rating" => floor(User::findOrFail(session('dataUser')['id'])->review->avg('rating'))
        ]);
    }
    public function update(Request $request)
    {
        if(isset($request['terima'])){
            $request['status'] = 'Diterima';
            try {
                Tawar::findOrFail($request->id)->update($request->only('status'));
                return redirect()->to("/penawaran")->send();
            } catch (QueryException $e) {
                return $e->errorInfo;
            }
        }
        if(isset($request['tolak'])){
            $request['status'] = 'Ditolak';
            try {
                Tawar::findOrFail($request->id)->update($request->only('status'));
                return redirect()->to("/penawaran")->send();
            } catch (QueryException $e) {
                return $e->errorInfo;
            }
        }
    }
}
