<?php

namespace App\Http\Controllers;

use App\Models\Bantuan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class BantuanAPI extends Controller
{
    public function index(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'permasalahan' => ['required'],
            'pesan' => ['required']
        ]);
        
        if($validate->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validate->errors()
            ], Response::HTTP_BAD_REQUEST);
        }
        $request['status'] = 'Belum dibalas';
        $request['tgl_pengajuan'] = date('Y-m-d');
        try {
            $user = Bantuan::create($request->all());
            return response()->json([
                'status'=>200,
                'message'=>'Berhasil'
            ], Response::HTTP_OK);
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
}
