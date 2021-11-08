<?php

namespace App\Http\Controllers;

use App\Models\Wishlist as ModelsWishlist;
use Illuminate\Http\Request;

class Wishlist extends Controller
{
    public function index()
    {
        return view('wishlist',[
            "css" => "wishlist",
            "title" => "Wishlist",
            "wishlist" => ModelsWishlist::where('user_id', session('dataUser')['id'])->get()
        ]);
    }
}
