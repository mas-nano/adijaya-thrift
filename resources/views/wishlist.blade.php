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
                @foreach ($wishlist as $w)
                <li>
                    <div class="produk">
                        <img src="img/uploads/produk/{{ $w->produk->foto }}" alt="" srcset="" class="gambar-produk">
                        <p class="harga-barang"><a href="http://localhost:8000/produk/{{ $w->produk->id }}" class="link-produk">{{ $w->produk->nama_produk }}</a></p>
                        @if (!is_null($w->produk->promo))
                            <p class="harga-barang fs-18">Rp<strike>{{ number_format($w->produk->harga, 0, ',', '.') }}</strike></p>
                            <p class="harga-barang fs-20 orange">Rp{{ number_format($w->produk->promo, 0, ',', '.') }}</p>
                            @else
                            <p class="harga-barang fs-18">Rp{{ number_format($w->produk->harga, 0, ',', '.') }}</p>
                            @endif
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection