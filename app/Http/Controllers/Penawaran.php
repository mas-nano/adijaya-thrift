<?php

namespace App\Http\Controllers;

use App\Models\Tawar;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class Penawaran extends Controller
{
    public function index()
    {
        $query = Tawar::where('penjual_id', session('dataUser')['id'])->get();
        foreach($query as $q){
            $q->produk;
            $q->user;
        }
        return view('penawaran',[
            "css" => "penawaran",
            "title" => "Penawaran",
            "tawar" => $query
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
