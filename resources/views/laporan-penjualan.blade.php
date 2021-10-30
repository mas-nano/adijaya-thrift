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
                <a href="/produk-toko" class="atas">Produk</a>
                <a href="/chat" class="">Pesan</a>
                <a href="/penawaran" class="">Penawaran</a>
                <a href="/pesanan-masuk" class="">Penjualan</a>
                <a href="" class="terpilih">Laporan Penjualan</a>
                <a href="/riwayat-penjualan" class="">Riwayat Penjualan</a>
                <a href="/bantuan" class="bawah">Bantuan</a>
            </div>
        </div>
    </div>
    <div class="split"></div>
    <div class="right">
        <div class="box">
            <div class="width-90 pt-10">
                <p>Total penjualan hari ini:</p>
                <p>Rp1230000</p>
            </div>
        </div>
        <div class="box">
            <p class="center">Laporan Mingguan</p>
            <canvas id="chart"></canvas>
        </div>
    </div>
</div>
<script src="js/laporan-penjualan.js"></script>
@endsection