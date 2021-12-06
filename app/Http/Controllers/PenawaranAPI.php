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
    public function getPenawaran(Request $request)
    {
        $tawar = Tawar::where('user_id', $request->user_id)->get();
        foreach ($tawar as $t) {
            $t->produk;
            $t->produk->url = app('firebase.storage')->getBucket()->object("img/produk/".$t->produk->foto)->signedUrl(new \DateTime('tomorrow'));
            $t->user;
            $t->user->url = app('firebase.storage')->getBucket()->object("img/profil/".$t->user->photo)->signedUrl(new \DateTime('tomorrow'));
        }
        return response()->json([
            'status'=>200,
            'tawar'=>$tawar
        ], Response::HTTP_OK);
    }
    public function update(Request $request, Tawar $tawar)
    {
        if($request->aksi=="terima"){
            $request['status'] = 'Diterima';
            $notif['pesan'] = 'Menerima penawaran anda untuk '.$tawar->produk->nama_produk;
        }elseif($request->aksi=="tolak"){
            $request['status'] = 'Ditolak';
            $notif['pesan'] = 'Menolak penawaran anda untuk '.$tawar->produk->nama_produk;
        }
        $notif['user_id'] = $request->id_pembeli;
        $notif['subjudul'] = $request->nama_penjual;
        $notif['destinasi'] = 'riwayat';
        try {
            Notification::create($notif);
            $tawar->update($request->only('status'));
            return response()->json([
                'status'=>200,
                'message'=>'Berhasil'
            ], Response::HTTP_OK);
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
}
