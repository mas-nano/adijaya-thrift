<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Pemesanan;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;

class Penjualan extends Controller
{
    public function index()
    {
        if(!session('dataUser')){
            return redirect()->secure('/login')->send();
        }
        $total = [];
        $tmp = Pemesanan::where('penjual_id', session('dataUser')['id'])->where('status_terima', 'Selesai')->whereDate('updated_at', date('Y-m-d'))->get();
        foreach ($tmp as $t) {
            array_push($total, $t->pembayaran->total-22500);
        }
        $pemesanan = Pemesanan::where('penjual_id', session('dataUser')['id'])->orderBy('created_at', 'desc')->get();
        return view('penjualan',[
            "css" => "penjualan",
            "title" => "Penjualan",
            "total" => array_sum($total),
            "pemesanan" => $pemesanan,
            "rating" => floor(User::findOrFail(session('dataUser')['id'])->review->avg('rating'))
        ]);
    }
    public function detail()
    {
        if(!session('dataUser')){
            return redirect()->secure('/login')->send();
        }
        if(!User::find(session('dataUser')['id'])->lengkap){
            return redirect()->secure('/akun')->send();
        }
        $en = CarbonImmutable::now()->locale('en_US');
        $jml = 0;
        $total = $tgl = $sub = [];
        $tmp = Pemesanan::where('penjual_id', session('dataUser')['id'])->where('status_terima', 'Selesai')->whereDate('updated_at', date('Y-m-d'))->get();
        foreach ($tmp as $t) {
            array_push($total, $t->pembayaran->total-22500);
        }
        for($i=0; $i<5; $i++){
            $tmp = Pemesanan::where('penjual_id', session('dataUser')['id'])->where('status_terima', 'Selesai')->where('updated_at', '>=', $en->startOfWeek()->subweek($i)->format('Y-m-d H:i'))->where('updated_at', '<=', $en->endOfWeek()->subweek($i)->format('Y-m-d H:i'))->get();
            array_push($tgl, $en->startOfWeek()->subweek($i)->format('d/m').'-'.$en->endOfWeek()->subweek($i)->format('d/m'));
            foreach ($tmp as $t) {
                $jml = $jml + $t->pembayaran->total-22500;
            }
            array_push($sub, $jml);
            $jml = 0;
        }
        return view('laporan-penjualan',[
            "css" => "laporan-penjualan",
            "title" => "Laporan Penjualan",
            "total" => array_sum($total),
            "rating" => floor(User::findOrFail(session('dataUser')['id'])->review->avg('rating')),
            "tanggal" => $tgl,
            "jumlah" => $sub
        ]);
    }
}
