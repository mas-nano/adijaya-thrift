<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TokoAPI extends Controller
{
    public function index(User $user)
    {
        $user->url = app('firebase.storage')->getBucket()->object("img/profil/".$user->photo)->signedUrl(new \DateTime('tomorrow'));
        foreach ($user->produk as $p) {
            $p->url = app('firebase.storage')->getBucket()->object("img/produk/".$p->foto)->signedUrl(new \DateTime('tomorrow'));
        }
        foreach ($user->review as $r) {
            $r->user;
            $r->user->url = app('firebase.storage')->getBucket()->object("img/profil/".$r->user->photo)->signedUrl(new \DateTime('tomorrow'));
            $r->produk;
            $r->produk->url = app('firebase.storage')->getBucket()->object("img/produk/".$r->produk->foto)->signedUrl(new \DateTime('tomorrow'));
        }
        return response()->json([
            'status' => 200,
            'toko' => $user
        ], Response::HTTP_OK);
    }
}
