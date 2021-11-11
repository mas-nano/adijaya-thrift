<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Logout extends Controller
{
    public function index(Request $request)
    {
        $request->session()->flush();
        return redirect()->to('/')->send();
    }
    public function admin(Request $request)
    {
        $request->session()->flush();
        return redirect()->to('/admin')->send();
    }
}
