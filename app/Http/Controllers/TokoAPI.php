<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TokoAPI extends Controller
{
    public function index(User $user)
    {
        $user->produk;
        $user->review;
        return response()->json([
            'status' => 200,
            'toko' => $user
        ], Response::HTTP_OK);
    }
}
