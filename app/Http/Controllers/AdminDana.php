<?php

namespace App\Http\Controllers;

use App\Models\User;
use DivisionByZeroError;
use App\Models\Pemasukan;
use App\Models\Pemesanan;
use App\Models\Pengeluaran;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminDana extends Controller
{
    public function index()
    {
        if(!session('dataAdmin')){
            return redirect()->to('/admin')->send();
        }
        $bulan = [];
        $data['title'] = 'Perusahaan';
        $data['pemasukan'] = Pemasukan::all()->sum('nominal');
        for($i=1;$i<=12;$i++){
            array_push($bulan, Pemasukan::whereMonth('tgl', $i)->get()->sum('nominal'));
        }
        $data['bulan'] = $bulan;
        try {
            $data['pertumbuhan'] = ((Pemasukan::whereYear('tgl',date('Y'))->get()->sum('nominal')-Pemasukan::whereYear('tgl',date('Y')-1)->get()->sum('nominal'))/Pemasukan::whereYear('tgl',date('Y')-1)->get()->sum('nominal'))*100;
        } catch (DivisionByZeroError $e) {
            $data['pertumbuhan'] = 0;
        }
        $data['pengeluaran'] = Pengeluaran::all();
        return view('admin-perusahaan', $data);
    }
    public function tambah()
    {
        if(!session('dataAdmin')){
            return redirect()->to('/admin')->send();
        }
        return view('admin-kelolaDana',[
            "title" => "Perusahaan"
        ]);
    }
    public function postTambah(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nominal' => ['required', 'numeric'],
            'bank' => ['required'],
            'rek' => ['required'],
            'ket' => ['required']
        ]);
        if($validate->fails()) {
            return view('admin-kelolaDana',[
                "title" => "Perusahaan",
                "data" => json_decode($validate->errors(),true)
            ]);
        }
        $request['tgl'] = date("Y-m-d");
        try {
            Pengeluaran::create($request->all());
            return redirect()->to('/admin/perusahaan')->send();
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
    public function show(Pengeluaran $pengeluaran)
    {
        if(!session('dataAdmin')){
            return redirect()->to('/admin')->send();
        }
        return view('admin-kelolaDana',[
            "title" => "Perusahaan",
            "pengeluaran" => $pengeluaran
        ]);
    }
}
