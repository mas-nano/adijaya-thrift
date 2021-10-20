@extends('layouts.main')
@section('content')
<div class="wrapper">
    <div class="left">
        <div class="profil">
            <div>
                <img src="img/phooo 1.png" alt="">
            </div>
            <div>
                <p class="nama-toko">Aulia Dewi</p>
                <p class="nama-pengguna">@auliadewi</p>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span>(3)</span>
            </div>
        </div>
        <div class="pilihan">
            <div>
                <a href="" class="atas">Produk</a>
                <a href="" class="">Pesan</a>
                <a href="" class="">Penawaran</a>
                <a href="" class="">Penjualan</a>
                <a href="" class="">Laporan Penjualan</a>
                <a href="" class="terpilih">Riwayat Penjualan</a>
                <a href="" class="bawah">Bantuan</a>
            </div>
        </div>
    </div>
    <div class="split"></div>
    <div class="right">
        <div class="box-radius-18">
            <div class="width-90">
                <div class="status-produk">
                    <img src="img/sepatu.png" alt="">
                    <div class="flex-3 mg-l-3">
                        <p class="louis-16">Sudah Dibayar</p>
                        <p class="louis-12">Belum Diterima</p>
                    </div>
                    <p class="flex-5 align-r louis-12"></p>
                    <p class="flex-1 align-r"><i class="fa fa-print" aria-hidden="true"></i></p>
                </div>
                <div class="status-produk">
                    <img src="img/sepatu.png" alt="">
                    <div class="flex-3 mg-l-3">
                        <p class="louis-16">Sudah Dibayar</p>
                        <p class="louis-12">Selesai</p>
                    </div>
                    <p class="flex-5 align-r louis-12">Ajukan Pencairan</p>
                    <p class="flex-1 align-r"><i class="fa fa-print" aria-hidden="true"></i></p>
                </div>
                <div class="status-produk">
                    <img src="img/sepatu.png" alt="">
                    <div class="flex-3 mg-l-3">
                        <p class="louis-16">Sudah Dibayar</p>
                        <p class="louis-12 green">Sudah Dicairkan</p>
                    </div>
                    <p class="flex-5 align-r louis-12"></p>
                    <p class="flex-1 align-r"><i class="fa fa-print" aria-hidden="true"></i></p>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection