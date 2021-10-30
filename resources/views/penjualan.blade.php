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
                    <a href="/akun" class="atas">Edit Profil</a>
                    <a href="/riwayat" class="">Riwayat</a>
                    <a href="" class="terpilih">Penjualan</a>
                    <a href="/wishlist" class="">Wishlist</a>
                    <a href="/chat" class="bawah">Pesan</a>
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
                    <p class="montserrat fw-5 fs-24 mb-0">Total penjualan hari ini:</p>
                    <p class="louis-b fs-48 mt-1">Rp1230000</p>
                </div>
            </div>
            <div class="box">
                <div class="width-90 pt-10">
                    <p class="montserrat fw-5 fs-24">Riwayat Penjualan</p>
                    <div class="flex mb-3">
                        <img src="img/sepatu.png" alt="">
                        <div class="flex-5">
                            <p class="louis fs-23">Sepatu Nike</p>
                            <p class="louis fs-14">Sudah Dibayar</p>
                        </div>
                        <p class="flex-1 louis fs-23">Detail</p>
                    </div>
                    <div class="flex mb-3">
                        <img src="img/sepatu.png" alt="">
                        <div class="flex-5">
                            <p class="louis fs-23">Sepatu Nike</p>
                            <p class="louis fs-14">Sudah Dibayar</p>
                        </div>
                        <p class="flex-1 louis fs-23">Detail</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection