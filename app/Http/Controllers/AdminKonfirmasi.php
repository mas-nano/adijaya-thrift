<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AdminKonfirmasi extends Controller
{
    public function index(Request $request)
    {
        if(!session('dataAdmin')){
            return redirect()->to('/admin')->send();
        }
        return view('admin-konfirmasiList',[
            "title" => "Konfirmasi",
            "konfirmasi" => Pemesanan::whereNotNull('status_admin')->where('status_admin', 'like', '%'.$request->search.'%')->get(),
            "req" => $request->search
        ]);
    }
    public function show(Pemesanan $pemesanan)
    {
        if(!session('dataAdmin')){
            return redirect()->to('/admin')->send();
        }
        return view('admin-konfirmasi',[
            "title" => "Konfirmasi",
            "pemesanan" => $pemesanan
        ]);
    }
    public function update(Pemesanan $pemesanan)
    {
        $data['status_admin'] = 'Sudah Dikonfirmasi';
        $data['status_pembeli'] = 'Telah Dikonfirmasi';
        $data['status_kirim'] = 'Belum dikirim';
        try {
            $pemesanan->update($data);
            return redirect()->to('/admin/konfirmasi');
        } catch (QueryException $e) {
            return $e->errorInfo;
        }
    }
}
