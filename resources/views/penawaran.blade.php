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
                <a href="" class="terpilih">Penawaran</a>
                <a href="" class="">Penjualan</a>
                <a href="" class="">Laporan Penjualan</a>
                <a href="" class="">Riwayat Penjualan</a>
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
                    <div class="flex-5 mg-l-3">
                        <p class="louis-16">Laras Wahyu menawar</p>
                        <p class="louis-16">Sepatu Ngganteng</p>
                    </div>
                    <div class="flex-5 align-r">
                        <p class="louis-16">Rp5000</p>
                        <button class="btn bg-orange">Terima</button>
                        <button class="btn bg-red">Tolak</button>
                    </div>
                </div>
                <div class="status-produk">
                    <img src="img/sepatu.png" alt="">
                    <div class="flex-5 mg-l-3">
                        <p class="louis-16">Laras Wahyu menawar</p>
                        <p class="louis-16">Sepatu Ngganteng</p>
                    </div>
                    <div class="flex-5 align-r">
                        <p class="louis-16">Rp5000</p>
                        <button class="btn bg-orange">Terima</button>
                        <button class="btn bg-red">Tolak</button>
                    </div>
                </div>
                <div class="status-produk">
                    <img src="img/sepatu.png" alt="">
                    <div class="flex-5 mg-l-3">
                        <p class="louis-16">Laras Wahyu menawar</p>
                        <p class="louis-16">Sepatu Ngganteng</p>
                    </div>
                    <div class="flex-5 align-r">
                        <p class="louis-16">Rp5000</p>
                        <button class="btn bg-orange">Terima</button>
                        <button class="btn bg-red">Tolak</button>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection