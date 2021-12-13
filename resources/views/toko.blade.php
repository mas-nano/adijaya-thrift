@extends('layouts.main')
@section('content')
@php
    $i=0;
@endphp
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
        <a href="/toko/{{ $user->id }}" class="atas terpilih">Ulasan</a>
        <a href="{{ $user->id }}/produk" class="bawah">Produk</a>
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
<div class="ulasan {{ (count($review)<1?"flex":"") }}">
    @if (count($review)<1)
        <p class="warn">Laman ini kosong</p>
    @else
    <div class="ulasan-wrap-luar">
        <div class="ulasan-wrap-dalam">
            <p class="heading">{{ count($review) }} Ulasan Produk</p>
            <p class="subheading">{{ round($review->avg('rating'),1) }} dari 5 
                @for ($j = 1; $j <= 5; $j++)
                <i class="{{ ($j<=floor($review->avg('rating'))?"fas":"far") }} fa-star checked"></i>
                @endfor
            </p>
            <hr class="grey">
            @foreach ($review as $r)
            <div class="ulasan-rinci">
                <div>
                    <img src="{{ app('firebase.storage')->getBucket()->object("img/produk/".$r->produk->foto)->signedUrl(new \DateTime('tomorrow')) }}" alt="">
                </div>
                <div>
                    <p class="nama-pengguna">{{ '@'.$r->user->username }}</p>
                    <p class="nama-produk">{{ $r->produk->nama_produk }}</p>
                    <p class="star">
                        @for ($j = 1; $j <= 5; $j++)
                        <i class="{{ ($j<=$r->rating?"fas":"far") }} fa-star checked"></i>
                        @endfor
                    </p>
                    <p class="deskripsi-ulasan">{{ $r->review }}</p>
                </div>
            </div>
            @if (++$i!=count($review))
            <hr class="grey">
            @endif
            @endforeach
        </div>
    </div>
    @endif
</div>
</div>
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDMzbOwUZw-S8v7KzKj-d3-atmdr4nncE&callback=initMap&v=weekly"
async
></script>
<script src="{{ asset('js/profilToko.js') }}"></script>
@endsection