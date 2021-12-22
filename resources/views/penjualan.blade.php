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
                    <a href="/akun" class="atas">Edit Profil</a>
                    <a href="/riwayat" class="">Riwayat</a>
                    <a href="" class="terpilih">Penjualan</a>
                    <a href="/wishlist" class="">Disukai</a>
                    <a href="/chat" class="bawah">Pesan</a>
                    <a href="/toko/{{ session('dataUser')['id'] }}">Profil</a>
                    <a class="link" href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Keluar</a>
                </div>
            </div>
        </div>
        <div class="split"></div>
        <div class="right">
            <div class="center">
                <p><a href="/produk-toko" class="btn-lengkap">Lihat Lebih Lengkap</a></p>
            </div>
            <div class="box">
                <div class="width-90 pt-10">
                    <p class="montserrat fw-5 fs-24 mb-0">Total penjualan hari ini:</p>
                    <p class="louis-b fs-48 mt-1">Rp{{ number_format($total, 0, ',', '.') }}</p>
                </div>
            </div>
            <div class="box">
                <div class="width-90 pt-10">
                    <p class="montserrat fw-5 fs-24">Riwayat Penjualan</p>
                    @foreach ($pemesanan as $p)
                        @if (!is_null($p->status_terima))
                        <div class="flex mb-3">
                            <img src="{{ app('firebase.storage')->getBucket()->object("img/produk/".$p->produk->foto)->signedUrl(new \DateTime('tomorrow')) }}" alt="">
                            <div class="flex-5">
                                <p class="louis fs-23">{{ $p->produk->nama_produk }}</p>
                                <p class="louis fs-14"><a href="/toko/{{ $p->pembeli->id }}" class="td-0"><i class="fas fa-user"></i> {{ '@'.$p->pembeli->username }}</a></p>
                                <p class="louis fs-14">{{ $p->status_terima }}</p>
                            </div>
                            <p class="flex-1 louis fs-23"><a href="/detail-pemesanan/{{ $p->id }}" class="link-detail">Detail</a></p>
                        </div>
                        @endif        
                    @endforeach
                    @if (count($pemesanan)<1)
                    <p class="montserrat ta-c">Riwayat penjualan tidak ditemukan</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection