<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;
use App\Models\Wishlist as ModelsWishlist;

class Wishlist extends Controller
{
    public function index()
    {
        if(!session('dataUser')){
            return redirect()->secure('/login')->send();
        }
        return view('wishlist',[
            "css" => "wishlist",
            "title" => "Wishlist",
            "wishlist" => ModelsWishlist::where('user_id', session('dataUser')['id'])->get(),
            "rating" => floor(User::findOrFail(session('dataUser')['id'])->review->avg('rating'))
        ]);
    }
    public function store(Request $request)
    {
        try {
            $wishlist = ModelsWishlist::create($request->all());
            return response()->json([
                'status'=>200,
                'message' => 'Sukses',
                'data' => $wishlist
            ], Response::HTTP_OK);
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
    public function destroy(ModelsWishlist $wishlist)
    {
        $wishlist->delete();
        return response()->json([
            'status'=>200,
            'message' => 'Berhasil Dihapus'
        ], Response::HTTP_OK);
    }
}
