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
                <a href="/produk-toko" class="atas">Produk</a>
                <a href="/chat" class="">Pesan</a>
                <a href="/penawaran" class="">Penawaran</a>
                <a href="" class="terpilih">Penjualan</a>
                <a href="/laporan-penjualan" class="">Laporan Penjualan</a>
                <a href="/riwayat-penjualan" class="">Riwayat Penjualan</a>
                <a href="/bantuan" class="bawah">Bantuan</a>
            </div>
        </div>
    </div>
    <div class="split">
        <input type="hidden" name="" id="user_id" value="{{ session('dataUser')['id'] }}">
        <input type="hidden" name="" id="_token" value="{{ csrf_token() }}">
    </div>
    <div class="right">
        <div class="box-radius-18">
            <div class="width-90">
                <select name="filter" id="filter" class="dropdown louis-16">
                    <option value="">Filter</option>
                    <option value="Belum Dikirim">Belum Dikirim</option>
                    <option value="Sudah Dikirim">Sudah Dikirim</option>
                </select>
                <div id="hasil">
                    @if(count($pemesanan)>0)
                        @foreach ($pemesanan as $p)
                        <div class="status-produk">
                            <img src="img/uploads/produk/{{ $p->produk->foto }}" alt="">
                            <div class="flex-5 mg-l-3">
                                <p class="louis-16">{{ $p->produk->nama_produk }}</p>
                                <p class="louis fs-14 {{ ($p->status_penjual=="Sudah dikirim"?"green":"") }}">{{ $p->status_penjual }}</p>
                            </div>
                            <p class="flex-5 align-r louis-16"><a href="/detail-pemesanan/{{ $p->id }}" class="td-0 black">Detail</a></p>
                        </div>
                            @if (++$i!=count($pemesanan))
                                <hr class='grey'>
                            @endif
                        @endforeach
                    @else
                    <p class="warn">Penjualan tidak ditemukan</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/pesanan.js"></script>
@endsection