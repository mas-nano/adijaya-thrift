@extends('layouts.main')
@section('content')
    
<div class="profil-toko">
    <div class="profil">
        <div>
            <img src="{{ app('firebase.storage')->getBucket()->object("img/profil/".$user->photo)->signedUrl(new \DateTime('tomorrow')) }}" alt="">
        </div>
        <div>
            <p class="nama-toko">{{ $user->name }}</p>
            <p class="nama-pengguna">{{ '@'.$user->username }}</p>
            @for ($j = 1; $j <= 5; $j++)
                <i class="{{ ($j<=floor($review->avg('rating'))?"fas":"far") }} fa-star checked"></i>
            @endfor
        </div>
    </div>
    <div class="pilihan">
        <a href="/toko/{{ $user->id }}" class="atas">Review</a>
        <a href="{{ $user->id }}/produk" class="bawah terpilih">Produk</a>
    </div>
    <div class="wrapper-maps">
        @if (!isset($user->lat))
            <p class="center">Belum mengatur lokasi</p>
        @else
        <div id="maps" data-lat="{{ (isset($user->lat)?$user->lat:"") }}" data-lng="{{ (isset($user->lng)?$user->lng:"") }}">
        </div>
        @endif
    </div>
</div>
<div class="split"></div>
<div class="ulasan {{ (count($produk)<1?"flex":"") }}">
    @if (count($produk)<1)
    <p class="warn">Laman ini kosong</p>
    @else
    <ul class="hasil">
        @foreach ($produk as $p)
            @if ($p->stok>0)
            <li>
                <div class="produk" data-id="{{ $p->id }}">
                    <img src="{{ app('firebase.storage')->getBucket()->object("img/produk/".$p->foto)->signedUrl(new \DateTime('tomorrow')) }}" alt="" srcset="" class="gambar-produk">
                    <p class="nama-barang">{{ $p->nama_produk }}</p>
                    @if (isset($p->promo))
                    <p class="harga-barang">Rp<strike>{{ number_format($p->harga,0,',','.') }}</strike></p>
                    <p class="harga-barang fs-20 orange">Rp{{ number_format($p->promo,0,',','.') }}</p>
                    @else
                    <p class="harga-barang">Rp{{ number_format($p->harga,0,',','.') }}</p>
                    @endif
                </div>
            </li>
        @endif
        @endforeach
    </ul>
    @endif
</div>
</div>
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDMzbOwUZw-S8v7KzKj-d3-atmdr4nncE&callback=initMap&v=weekly"
async
></script>
<script src="{{ asset('js/profilToko.js') }}"></script>
<script>
    $(".produk").click(function(){
        window.location.href = `/produk/${$(this).data("id")}`
    })
</script>
@endsection