<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tawar;
use App\Models\Produk;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class PenawaranAPI extends Controller
{
    public function index(Produk $produk, Request $request)
    {
        if($request->user_id){
            $user = User::findOrFail($request->user_id);
            $validate = Validator::make($request->all(), [
                'nominal' => ['required', 'numeric']
            ]);
            
            if($validate->fails()) {
                return response()->json(['status'=>400, 'errors'=>$validate->errors()], Response::HTTP_BAD_REQUEST);
            }
            $request['produk_id'] = $produk->id;
            $request['user_id'] = $user->id;
            $request['penjual_id'] = $produk->id_penjual;
            $request['status'] = 'Proses';
            $notif['user_id'] = $produk->id_penjual;
            $notif['subjudul'] = $user->name;
            $notif['pesan'] = 'Mengajukan penawaran untuk '.$produk->nama_produk;
            $notif['destinasi'] = 'penawaran';
            try {
                if(is_null($tawar = Tawar::where('user_id', $user->id)->where('produk_id', $produk->id)->where('status',' Proses')->first())){
                    Tawar::create($request->all());
                }else{
                    $tawar->update($request->all());
                }
                Notification::create($notif);
                return response()->json([
                    'status'=>200,
                    'message' => 'Berhasil'
                ], Response::HTTP_OK);
            } catch (QueryException $e) {
                return $e->errorInfo;
            }
        }else{
            return response()->json([
                'status'=>400,
                'message' => 'Masukkan parameter user_id (pembeli)'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
