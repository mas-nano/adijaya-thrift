@extends('layouts.main')
@section('content')
@php
    $kosong = 0;
@endphp
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
                            @if (!is_null($p->status_kirim))
                                <div class="status-produk">
                                    <img src="{{ app('firebase.storage')->getBucket()->object("img/produk/".$p->produk->foto)->signedUrl(new \DateTime('tomorrow')) }}" alt="">
                                    <div class="flex-5 mg-l-3">
                                        <p class="louis-16">{{ $p->produk->nama_produk }}</p>
                                        <p class="louis fs-14"><i class="fas fa-user"></i> {{ '@'.$p->pembeli->username }}</p>
                                        <p class="louis fs-14 {{ ($p->status_kirim=="Sudah dikirim"?"green":"") }}">{{ $p->status_kirim}}</p>
                                    </div>
                                    <p class="flex-5 align-r louis-16"><a href="/detail-pemesanan/{{ $p->id }}" class="td-0 pd-10">Detail</a></p>
                                </div>
                                @if (++$i!=count($pemesanan))
                                    <hr class='grey'>
                                @endif
                            @else
                            @php
                                $kosong = $kosong + 1;
                            @endphp
                            @endif
                        @endforeach
                    @endif
                    @if ($kosong == count($pemesanan))
                        <p class="warn">Penjualan tidak ditemukan</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/pesanan.js') }}"></script>
@endsection