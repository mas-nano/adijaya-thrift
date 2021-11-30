<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Bantuan as ModelsBantuan;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class Bantuan extends Controller
{
    public function index()
    {
        return view('bantuan',[
            "css" => "bantuan",
            "title" => "Bantuan"
        ]);
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'permasalahan' => ['required'],
            'pesan' => ['required']
        ]);
        
        if($validate->fails()) {
            return redirect()->secure("/bantuan")->with(["data"=>json_decode($validate->errors(),true)]);
        }
        $request['status'] = 'Belum dibalas';
        $request['tgl_pengajuan'] = date('Y-m-d');
        try {
            $user = ModelsBantuan::create($request->all());
            return redirect()->secure("/bantuan")->with("success", '<div class="centang">
            <p><i class="fas fa-check fs-48 green"></i></p>
            <p class="louis fs-20">Telah terkirim</p>
            </div>');
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
}
