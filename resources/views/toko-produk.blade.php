@extends('layouts.main')
@section('content')
    
<div class="profil-toko">
    <div class="profil">
        <div>
            <img src="../img/uploads/profile_images/{{ (isset($data['photo'])?$data['photo']:"") }}" alt="">
        </div>
        <div>
            <p class="nama-toko">{{ (isset($data['name'])?$data['name']:"") }}</p>
            <p class="nama-pengguna">{{ (isset($data['username'])?"@".$data['username']:"") }}</p>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span>(3)</span>
        </div>
    </div>
    <div class="pilihan">
        <a href="1" class="atas">Review</a>
        <a href="?produk=true" class="bawah terpilih">Produk</a>
    </div>
    <div class="wrapper-maps">
        <div id="maps" data-lat="{{ (isset($data['lat'])?$data['lat']:"") }}" data-lng="{{ (isset($data['lng'])?$data['lng']:"") }}">
        </div>
    </div>
</div>
<div class="split"></div>
<div class="ulasan">
    <ul class="hasil">
        @if (isset($produk))
            @for ($i = 0; $i < count($produk); $i++)
            <li>
                <div class="produk">
                    <img src="../img/uploads/produk/{{ $produk[$i]['foto'] }}" alt="" srcset="" class="gambar-produk">
                    <p class="nama-barang">{{ $produk[$i]['nama_produk'] }}</p>
                    <p class="harga-barang">Rp{{ number_format($produk[$i]['harga'],0,',','.') }}</p>
                </div>
            </li>
            @endfor
        @endif
    </ul>
</div>
</div>
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDMzbOwUZw-S8v7KzKj-d3-atmdr4nncE&callback=initMap&v=weekly"
async
></script>
<script src="../js/profilToko.js"></script>
@endsection