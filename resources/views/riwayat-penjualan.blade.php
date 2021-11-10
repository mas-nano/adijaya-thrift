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
                <a href="/pesanan-masuk" class="">Penjualan</a>
                <a href="/laporan-penjualan" class="">Laporan Penjualan</a>
                <a href="" class="terpilih">Riwayat Penjualan</a>
                <a href="/bantuan" class="bawah">Bantuan</a>
            </div>
        </div>
    </div>
    <div class="split">
        <input type="hidden" name="" id="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="" id="user_id" value="{{ session('dataUser')['id'] }}">
    </div>
    <div class="right">
        <div class="box-radius-18">
            <div class="width-90">
                <select name="filter" id="filter" class="dropdown louis-16">
                    <option value="">Filter</option>
                    <option value="Belum Dikirim">Belum Diterima</option>
                    <option value="Selesai">Selesai</option>
                </select>
                <div id="hasil">
                    @if(count($riwayat)>0)
                        @foreach ($riwayat as $r)
                        <div class="status-produk">
                            <img src="img/uploads/produk/{{ $r->produk->foto }}" alt="">
                            <div class="flex-5 mg-l-3">
                                <p class="louis-16">{{ $r->produk->nama_produk }}</p>
                                <p class="louis-12">{{ ($r->status_penjual=='Sudah dikirim'?"Belum Diterima":$r->status_penjual) }}</p>
                            </div>
                            <p class="flex-5 align-r louis-12"><a href="/detail-pemesanan/{{ $r->id }}" class="td-0 black link-detail{{ ($r->status_penjual=='Selesai'?' '.$r->status_penjual:"") }}">
                                @if ($r->status_penjual=='Selesai')
                                    Ajukan pencairan
                                @elseif($r->status_penjual=='Sudah dicairkan'&&$r->status_penjual=='Proses')
                                @else
                                Detail
                                @endif
                            </a></p>
                        </div>
                            @if (++$i!=count($riwayat))
                                <hr class='grey'>
                            @endif
                        @endforeach
                    @else
                    <p class="warn">Riwayat penjualan tidak ditemukan</p>
                    @endif
                </div>   
            </div>
        </div>
    </div>
</div>
<script src="js/riwayat-penjualan.js"></script>
@endsection