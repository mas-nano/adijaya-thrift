<?php

namespace App\Http\Controllers;

use App\Models\Notification;
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
        try {
            Notification::where('user_id', session('dataUser')['id'])->where('destinasi', 'penawaran')->delete();
        } catch (QueryException $e) {
            return $e->errorInfo;
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
            $notif['user_id'] = $request->user_id;
            $notif['subjudul'] = session('dataUser')['nama'];
            $notif['pesan'] = 'Menerima penawaran anda untuk '.$request->nama_produk;
            $notif['destinasi'] = 'riwayat';
            try {
                Notification::create($notif);
                Tawar::findOrFail($request->id)->update($request->only('status'));
                return redirect()->to("/penawaran")->send();
            } catch (QueryException $e) {
                return $e->errorInfo;
            }
        }
        if(isset($request['tolak'])){
            $request['status'] = 'Ditolak';
            $notif['user_id'] = $request->user_id;
            $notif['subjudul'] = session('dataUser')['nama'];
            $notif['pesan'] = 'Menolak penawaran anda untuk '.$request->nama_produk;
            $notif['destinasi'] = 'riwayat';
            try {
                Notification::create($notif);
                Tawar::findOrFail($request->id)->update($request->only('status'));
                return redirect()->to("/penawaran")->send();
            } catch (QueryException $e) {
                return $e->errorInfo;
            }
        }
    }
}
