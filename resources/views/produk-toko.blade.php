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
        <p class="montserrat btn align-c"><a href="/kelolaProduk" class="white td-0">Tambah Produk</a></p>
        <ul class="hasil">
            @if (isset($data))
                @for ($i = 0; $i < count($data); $i++)
                <li>
                    <div class="produk">
                        <img src="../img/uploads/produk/{{ $data[$i]["foto"] }}" alt="" srcset="" class="gambar-produk">
                        <p class="nama-barang"><a href="/produk/{{ $data[$i]['id'] }}" class="td-0 black">{{ $data[$i]['nama_produk'] }}</a></p>
                        <p class="harga-barang">Rp{{ number_format($data[$i]['harga'],0,',','.') }}</p>
                        <p class="louis fs-14 align-r"><a href="/kelolaProduk/{{ $data[$i]['id'] }}" class="td-0 black">Ubah</a></p>
                    </div>
                </li>
                @endfor
            @endif
        </ul>
    </div>
</div>
@endsection