@extends('layouts.main')
@section('content')
<div class="wrapper">
    <div class="left">
        <div class="profil">
            <div>
                <img src="{{ asset('img/uploads/profile_images/'.session('dataUser')['gambar']) }}" alt="">
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
                            <img src="{{ asset('img/uploads/produk/'.$r->produk->foto) }}" alt="">
                            <div class="flex-5 mg-l-3">
                                <p class="louis-16">{{ $r->produk->nama_produk }}</p>
                                <p class="louis-12 {{ ($r->status_ajukan=='Sudah dicairkan'?"green":"") }}">{{ (is_null($r->status_ajukan)?$r->status_terima:$r->status_ajukan) }}</p>
                            </div>
                            <p class="flex-5 align-r louis-12"><a href="/detail-pemesanan/{{ $r->id }}" class="td-0 black link-detail{{ ($r->status_terima=='Selesai'?' '.$r->status_terima:"") }}" data-pemesanan_id="{{ $r->id }}">
                                @if ($r->status_terima=='Selesai'&&is_null($r->status_ajukan))
                                    Ajukan pencairan
                                @elseif(!is_null($r->status_ajukan))
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
<script src="{{ asset('js/riwayat-penjualan.js') }}"></script>
@endsection