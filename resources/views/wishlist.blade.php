@extends('layouts.main')
@section('content')
    <div class="wrapper">
        <div class="left">
            <div class="profil">
                <div>
                    <img src="img/uploads/profile_images/{{ (session('dataUser')['gambar']?session('dataUser')['gambar']:"phooo 1.png") }}" alt="">
                </div>
                <div>
                    <p class="nama-toko">{{ session('dataUser')['nama'] }}</p>
                    <p class="nama-pengguna">{{ '@'.session('dataUser')['username'] }}</p>
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
                    <a href="/akun" class="atas">Edit Profil</a>
                    <a href="/riwayat" class="">Riwayat</a>
                    <a href="/penjualan" class="">Penjualan</a>
                    <a href="" class="terpilih">Wishlist</a>
                    <a href="/chat" class="bawah">Pesan</a>
                </div>
            </div>
            <div class="center">
                <p class="link">Profil</p>
                <p><i class="fa fa-sign-out" aria-hidden="true"></i><a class="link" href="/logout"> Keluar</a></p>
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
                    </div>
                </li>
                <li>
                    <div class="produk">
                        <img src="img/sepatu.png" alt="" srcset="" class="gambar-produk">
                        <p class="nama-barang">Sepatu Ngganteng</p>
                        <p class="harga-barang">Rp10.000</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection