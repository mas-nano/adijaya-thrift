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
                    <a href="" class="atas">Edit Profil</a>
                    <a href="" class="terpilih">Pemesanan</a>
                    <a href="" class="">Penjualan</a>
                    <a href="" class="">Wishlist</a>
                    <a href="" class="bawah">Pesan</a>
                </div>
            </div>
            <div class="center">
                <p class="link">Profil</p>
                <p><i class="fa fa-sign-out" aria-hidden="true"></i><span class="link"> Keluar</span></p>
            </div>
        </div>
        <div class="split"></div>
        <div class="right">
            <div class="box-radius-18">
                <div class="width-90">
                    <p class="sub montserrat-18">Status</p>
                    <div class="status-produk">
                        <img src="img/sepatu.png" alt="">
                        <p class="flex-5 mg-l-3 louis-16">Sudah Dibayar</p>
                        <p class="flex-5 align-r louis-16">Detail</p>
                        <p class="flex-1 align-c"><i class="fa fa-print" aria-hidden="true"></i></p>
                    </div>
                </div>
            </div>
            <div class="box-radius-18">
                <div class="width-90">
                    <p class="sub montserrat-18">Penawaran</p>
                    <div class="status-produk">
                        <img src="img/sepatu.png" alt="">
                        <p class="flex-5 mg-l-3 louis-16">Diterima</p>
                        <p class="flex-5 align-r louis-16">Detail</p>
                    </div>
                    <div class="status-produk">
                        <img src="img/sepatu.png" alt="">
                        <p class="flex-5 mg-l-3 louis-16 red">Ditolak</p>
                        <p class="flex-5 align-r louis-16"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection