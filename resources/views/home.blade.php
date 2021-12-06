@extends('layouts.main')
@section('content')
    
<div class="promo">
    <div class="link-promo pv-1">
        <p class="ta-c mv-0"><a href="/produk?promo=true" class="montserrat fw-500 fs-20 brown">PROMO!!</a></p>
    </div>
    <div class="banner">
        <img src="{{ asset('img/banner.png') }}" alt="" class="cover full">
    </div>
</div>
<div class="rekomendasi">
    <p class="title">REKOMENDASI</p>
    <ul class="rekom">
        @if (count($produk)>0)
            @foreach ($produk as $p)
            <li>
                <div class="produk" data-id="{{ $p->id }}">
                    <img src="{{ app('firebase.storage')->getBucket()->object("img/produk/".$p->foto)->signedUrl(new \DateTime('tomorrow')) }}" alt="" srcset="" class="gambar-produk">
                    <p class="nama-barang fs-24"><a href="/produk/{{ $p->id }}">{{ $p->nama_produk }}</a></p>
                    <p class="harga-barang fs-24">Rp{!! $p->promo?'<strike>'.number_format($p->harga, 0, ',', '.').'</strike>':number_format($p->harga, 0, ',', '.') !!}</p>
                    @if ($p->promo)
                        <p class="harga-barang orange fs-26">Rp{{ number_format($p->promo, 0, ',', '.') }}</p>
                    @endif
                </div>
            </li>
            @endforeach
        @endif
    </ul>
    <div class="more">
        <a href="" class="lebih">Lihat Lebih Banyak</a>
    </div>
</div>
</div>
<script src="{{ asset('js/home.js') }}"></script>
@endsection