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
                <a href="" class="atas terpilih">Produk</a>
                <a href="/chat" class="">Pesan</a>
                <a href="/penawaran" class="">Penawaran</a>
                <a href="/pesanan-masuk" class="">Penjualan</a>
                <a href="/laporan-penjualan" class="">Laporan Penjualan</a>
                <a href="/riwayat-penjualan" class="">Riwayat Penjualan</a>
                <a href="/bantuan" class="bawah">Bantuan</a>
            </div>
        </div>
    </div>
    <div class="split"></div>
    <div class="right">
        <p class="montserrat btn align-c"><a href="/upload" class="white td-0">Tambah Produk</a></p>
        <ul class="hasil">
            <li>
                <div class="produk">
                    <img src="../img/sepatu.png" alt="" srcset="" class="gambar-produk">
                    <p class="nama-barang">Sepatu Nike</p>
                    <p class="harga-barang">Rp10.000</p>
                    <p class="louis fs-14 align-r"><a href="" class="td-0 black">Ubah</a></p>
                </div>
            </li>
            <li>
                <div class="produk">
                    <img src="../img/sepatu.png" alt="" srcset="" class="gambar-produk">
                    <p class="nama-barang">Sepatu Nike</p>
                    <p class="harga-barang">Rp10.000</p>
                    <p class="louis fs-14 align-r"><a href="" class="td-0 black">Ubah</a></p>
                </div>
            </li>
        </ul>
    </div>
</div>
@endsection