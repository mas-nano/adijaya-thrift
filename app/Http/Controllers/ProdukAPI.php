<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\QueryException;

class ProdukAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, Request $request)
    {
        $produk = Produk::where('stok', '>', 0)->take($request->take)->get();
        if(!is_null($kategori = $user->pemesanan->last())){
            if($kategori = $kategori->produk->kategori){
                if(count($produk = Produk::where('kategori', $kategori)->where('stok', '>', 0)->take($request->take)->get())==0){
                    $produk = Produk::where('stok', '>', 0)->take($request->take)->get();
                }
            }
        }
        foreach ($produk as $p) {
            $p->url = app('firebase.storage')->getBucket()->object("img/produk/".$p->foto)->signedUrl(new \DateTime('tomorrow'));
        }
        return response()->json(['status'=>200, 'produk'=>$produk], Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
        try{
            $data = json_decode(Produk::filter(request(['search', 'daerah', 'kategori', 'sort', 'promo', 'min', 'max']))->where('stok', '>', 0)->take($request->take)->get(), true);
            for($i=0;$i<count($data);$i++){
                $data[$i]['harga']=number_format($data[$i]['harga'],0,',','.');
                if($data[$i]['promo']!=null){
                    $data[$i]['promo']=number_format($data[$i]['promo'],0,',','.');
                }
                $data[$i]['url'] = app('firebase.storage')->getBucket()->object("img/produk/".$data[$i]['foto'])->signedUrl(new \DateTime('tomorrow'));
            }
            return response()->json(['status'=>200, 'produk'=>$data], Response::HTTP_OK);
        }catch(QueryException $e){
            return $e->errorInfo;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk, Request $request)
    {
        if($request->user_id){
            $wishlist = Wishlist::where('user_id', $request->user_id)->where('produk_id', $produk->id)->first();
            $produk->user->review;
            $produk->url = app('firebase.storage')->getBucket()->object("img/produk/".$produk->foto)->signedUrl(new \DateTime('tomorrow'));
            $produk->user->url = app('firebase.storage')->getBucket()->object("img/profil/".$produk->user->photo)->signedUrl(new \DateTime('tomorrow'));
            return response()->json(['status'=>200,'produk'=>$produk, 'wishlist'=>$wishlist], Response::HTTP_OK);
        }
        return response()->json([
            'status'=>400,
            'message' => 'Masukkan parameter user_id'
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if($request['take']){
            $produk = json_decode(Produk::filter(request(['search', 'daerah', 'kategori', 'sort', 'promo', 'min', 'max']))->take($request['take'])->get());
            for($i=0;$i<count($produk);$i++){
                $produk[$i]->harga=number_format($produk[$i]->harga,0,',','.');
                $produk[$i]->url = app('firebase.storage')->getBucket()->object("img/produk/".$produk[$i]->foto)->signedUrl(new \DateTime('tomorrow'));
            }
            return response()->json(['status'=>200,'produk'=>$produk], Response::HTTP_OK);
        }else{
            return response()->json([
                'status'=>400,
                'message' => 'Masukkan parameter "take"'
            ],Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
