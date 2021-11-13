<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Penarikan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AdminPencairan extends Controller
{
    public function index(Request $request)
    {
        if(!session('dataAdmin')){
            return redirect()->to('/admin')->send();
        }
        $sort = $request->sort;
        $penarikan = Penarikan::whereHas('pemesanan', function($query) use ($sort){
            $query->where('status_ajukan', 'like', '%'.$sort.'%');
        })->get();
        return view('admin-pencairanList',[
            "title" => "Pencairan",
            "pencairan" => $penarikan,
            "req" => $request->sort
        ]);
    }
    public function show(Penarikan $penarikan)
    {
        if(!session('dataAdmin')){
            return redirect()->to('/admin')->send();
        }
        return view('admin-pencairan',[
            "title" => "Pencairan",
            "pencairan" => $penarikan
        ]);
    }
    public function update(Penarikan $penarikan)
    {
        $data['status_ajukan'] = 'Sudah dicairkan';
        $pemasukan['tgl'] = date('Y-m-d');
        $pemasukan['nominal'] = 2000;
        try {
            $penarikan->pemesanan->update($data);
            Pemasukan::create($pemasukan);
            return redirect()->to('/admin/pencairan')->send();
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
}
