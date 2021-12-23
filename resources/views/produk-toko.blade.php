@extends('layouts.main')
@section('content')
<div class="wrapper">
    <div class="left">
        <div class="profil">
            <div>
                <img src="{{ app('firebase.storage')->getBucket()->object("img/profil/".session('dataUser')['gambar'])->signedUrl(new \DateTime('tomorrow')) }}" alt="">
            </div>
            <div>
                <p class="nama-toko">{{ session('dataUser')['nama'] }}</p>
                <p class="nama-pengguna">{{ '@'.session('dataUser')['username'] }}</p>
                @for ($j = 1; $j <= 5; $j++)
                        <i class="{{ ($j<=$rating?"fas":"far") }} fa-star checked"></i>
                @endfor
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
        <div class="hasil">
            @if (isset($data))
                @for ($i = 0; $i < count($data); $i++)
                <div class="produk">
                    <img src="{{ app('firebase.storage')->getBucket()->object("img/produk/".$data[$i]['foto'])->signedUrl(new \DateTime('tomorrow')) }}" alt="" srcset="" class="gambar-produk">
                    <p class="nama-barang fs-18"><a href="/produk/{{ $data[$i]['id'] }}" class="td-0 black">{{ $data[$i]['nama_produk'] }}</a></p>
                    @if (isset($data[$i]['promo']))
                    <p class="harga-barang fs-18">Rp<strike>{{ number_format($data[$i]['harga'],0,',','.') }}</strike></p>
                    <p class="harga-barang fs-20 orange">Rp{{ number_format($data[$i]['promo'],0,',','.') }} (-{{ round(($data[$i]['harga']-$data[$i]['promo'])/$data[$i]['harga']*100) }}%)</p>
                    @else
                    <p class="harga-barang fs-18">Rp{{ number_format($data[$i]['harga'],0,',','.') }}</p>
                    @endif
                    <p class="louis-16 align-r"><a href="/kelolaProduk/{{ $data[$i]['id'] }}" class="td-0 white asdfg">Ubah</a></p>
                </div>
                @endfor
            @endif
        </ul>
    </div>
</div>
@endsection