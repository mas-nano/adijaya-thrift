<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index()
    {
        $data = Produk::all();
        
    }
}
