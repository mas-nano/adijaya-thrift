@extends('layouts.main')
@section('content')
    <div class="wrapper">
        <div class="left">
            <div class="profil">
                <div>
                    <img src="img/phooo 1.png" alt="">
                </div>
                <div>
                    <p class="nama-toko">Laras Wahyu</p>
                    <p class="nama-pengguna">@laraswahyu</p>
                </div>
            </div>
            <div class="pilihan">
                <div>
                    <a href="" class="atas">Edit Profil</a>
                    <a href="" class="">Pemesanan</a>
                    <a href="" class="terpilih">Penjualan</a>
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
            <div class="center">
                <p><a href="/" class="btn-lengkap">Lihat Lebih Lengkap</a></p>
            </div>
            <div class="box">
                <div class="width-90 pt-10">
                    <p>Total penjualan hari ini:</p>
                    <p>Rp1230000</p>
                </div>
            </div>
            <div class="box">
                <div class="width-90 pt-10">
                    <p>Riwayat Penjualan</p>
                    <div class="flex mb-3">
                        <img src="img/sepatu.png" alt="">
                        <p class="flex-5">Sudah Dibayar</p>
                        <p class="flex-1"><i class="fa fa-print" aria-hidden="true"></i></p>
                    </div>
                    <hr>
                    <div class="flex mb-3">
                        <img src="img/sepatu.png" alt="">
                        <p class="flex-5">Sudah Dibayar</p>
                        <p class="flex-1"><i class="fa fa-print" aria-hidden="true"></i></p>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
@endsection