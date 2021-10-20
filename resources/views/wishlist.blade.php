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
                    <a href="" class="">Penjualan</a>
                    <a href="" class="terpilih">Wishlist</a>
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
            <ul class="hasil">
                <li>
                    <div class="produk">
                        <img src="img/sepatu.png" alt="" srcset="" class="gambar-produk">
                        <p class="nama-barang">Sepatu Ngganteng</p>
                        <p class="harga-barang">Rp10.000</p>
                        <p class="end"><i class="fa fa-heart-o" aria-hidden="true"></i></p>
                    </div>
                </li>
                <li>
                    <div class="produk">
                        <img src="img/sepatu.png" alt="" srcset="" class="gambar-produk">
                        <p class="nama-barang">Sepatu Ngganteng</p>
                        <p class="harga-barang">Rp10.000</p>
                        <p class="end"><i class="fa fa-heart-o" aria-hidden="true"></i></p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection