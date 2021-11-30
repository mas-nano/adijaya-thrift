<?php

namespace App\Http\Controllers;

use App\Models\Bantuan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AdminBantuan extends Controller
{
    public function index(Request $request)
    {
        if(!session('dataAdmin')){
            return redirect()->secure('/admin')->send();
        }
        return view('admin-bantuanList',[
            "title" => "Bantuan",
            "bantuan" => Bantuan::where('status', 'like', '%'.$request->filter.'%')->get(),
            "req" => $request->filter
        ]);
    }
    public function show(Bantuan $bantuan)
    {
        if(!session('dataAdmin')){
            return redirect()->secure('/admin')->send();
        }
        return view('admin-bantuan',[
            "title" => "Bantuan",
            "bantuan" => $bantuan
        ]);
    }
    public function update(Bantuan $bantuan)
    {
        $data['tgl_dibalas'] = date('Y-m-d');
        $data['status'] = 'Selesai';
        try {
            $bantuan->update($data);
            return response()->json([
                'message' => 'Berhasil'
            ]);
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
}
