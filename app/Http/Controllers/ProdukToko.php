<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use App\Models\Tawar;
use App\Models\Produk;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdukToko extends Controller
{
    public function index()
    {
        if(!session('dataUser')){
            return redirect()->to('/login')->send();
        }
        if(!User::find(session('dataUser')['id'])->lengkap){
            return redirect()->to('/akun')->send();
        }
        $id = session('dataUser')['id'];
        $data = Produk::where('id_penjual', $id)->get();
        return view('produk-toko',[
            "css" => "produk-toko",
            "title" => "Produk Toko",
            "data" => json_decode($data, true),
            "rating" => floor(User::findOrFail(session('dataUser')['id'])->review->avg('rating'))
        ]);
    }
    public function show(Produk $produk)
    {
        $id = false;
        $data = User::findOrFail($produk->id_penjual);
        if(session('dataUser')){
            $wishlist = User::findOrFail(session('dataUser')['id']);
            if(isset($wishlist->wishlist->where('produk_id', $produk->id)->first()->id)){
                $id = $wishlist->wishlist->where('produk_id', $produk->id)->first()->id;
            }else{
                $id = false;
            }
        }
        $rating = User::findOrFail($produk->id_penjual)->review->avg('rating');
        return view('produk',[
            "css" => "produk",
            "title" => "Produk",
            "produk" => json_decode($produk, true),
            "data" => $data,
            "wishlist" => $id,
            "rating" => floor($rating)
        ]);
    }
    public function store(Produk $produk, Request $request)
    {
        $data = User::findOrFail($produk->id_penjual);
        $id = false;
        if(session('dataUser')){
            $validate = Validator::make($request->all(), [
                'nominal' => ['required', 'numeric']
            ]);
            
            if($validate->fails()) {
                $wishlist = User::findOrFail(session('dataUser')['id']);
                if(isset($wishlist->wishlist->where('produk_id', $produk->id)->first()->id)){
                    $id = $wishlist->wishlist->where('produk_id', $produk->id)->first()->id;
                }else{
                    $id = false;
                }
                $rating = User::findOrFail($produk->id_penjual)->review->avg('rating');
                return view('produk',[
                    "css" => "produk",
                    "title" => "Produk",
                    "produk" => json_decode($produk, true),
                    "data" => $data,
                    "wishlist" => $id,
                    "rating" => floor($rating)
                ]);
            }
            $request['produk_id'] = $produk->id;
            $request['user_id'] = session('dataUser')['id'];
            $request['penjual_id'] = $produk->id_penjual;
            $request['status'] = 'Proses';
            $notif['user_id'] = $produk->id_penjual;
            $notif['subjudul'] = session('dataUser')['nama'];
            $notif['pesan'] = 'Mengajukan penawaran untuk '.$produk->nama_produk;
            $notif['destinasi'] = 'penawaran';
            try {
                if(is_null($tawar = Tawar::where('user_id', session('dataUser')['id'])->where('produk_id', $produk->id)->where('status',' Proses')->first())){
                    Tawar::create($request->all());
                }else{
                    $tawar->update($request->all());
                }
                $wishlist = User::findOrFail(session('dataUser')['id']);
                if(isset($wishlist->wishlist->where('produk_id', $produk->id)->first()->id)){
                    $id = $wishlist->wishlist->where('produk_id', $produk->id)->first()->id;
                }else{
                    $id = false;
                }
                $rating = User::findOrFail($produk->id_penjual)->review->avg('rating');
                Notification::create($notif);
                return view('produk',[
                    "css" => "produk",
                    "title" => "Produk",
                    "produk" => json_decode($produk, true),
                    "data" => $data,
                    "wishlist" => $id,
                    "rating" => floor($rating)
                ]);
            } catch (QueryException $e) {
                return $e->errorInfo;
            }
        }else{
            return redirect()->to("/login")->send();
        }
    }
}
