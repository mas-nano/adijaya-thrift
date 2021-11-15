<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class Toko extends Controller
{
    public function index(User $user)
    {
        return view('toko',[
            "css" => "profilToko-review",
            "title" => $user->name,
            "user" => $user,
            "review" => $user->review
        ]);
    }
    public function produk(User $user)
    {
        return view('toko-produk',[
            "css" => "profilToko-review",
            "title" => $user->name,
            "user" => $user,
            "produk" => $user->produk
        ]);
    }
}
