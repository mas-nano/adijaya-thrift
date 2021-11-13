<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pemesanan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    public function index()
    {
        if(!session('dataAdmin')){
            return redirect()->to('/admin')->send();
        }
        $bulan = [];
        $data['title'] = 'Dashboard';
        $data['pemesanan'] = Pemesanan::all()->count();
        $data['user'] = User::all()->count();
        $data['pemasukan'] = Pemasukan::all()->sum('nominal');
        for($i=1;$i<=12;$i++){
            array_push($bulan, Pemasukan::whereMonth('tgl', $i)->get()->sum('nominal'));
        }
        $data['bulan'] = $bulan;
        return view('admin-dashboard',$data);
    }
}
