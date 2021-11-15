<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Wishlist as ModelsWishlist;

class Wishlist extends Controller
{
    public function index()
    {
        if(!session('dataUser')){
            return redirect()->to('/login')->send();
        }
        return view('wishlist',[
            "css" => "wishlist",
            "title" => "Wishlist",
            "wishlist" => ModelsWishlist::where('user_id', session('dataUser')['id'])->get(),
            "rating" => floor(User::findOrFail(session('dataUser')['id'])->review->avg('rating'))
        ]);
    }
}
