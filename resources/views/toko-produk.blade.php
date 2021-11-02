@extends('layouts.main')
@section('content')
    
<div class="profil-toko">
    <div class="profil">
        <div>
            <img src="../img/phooo 1.png" alt="">
        </div>
        <div>
            <p class="nama-toko">Aulia Dewi</p>
            <p class="nama-pengguna">@auliadewi</p>
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
        <div id="maps">
        </div>
    </div>
</div>
<div class="split"></div>
<div class="ulasan">
    <ul class="hasil">
        <li>
            <div class="produk">
                <img src="../img/sepatu.png" alt="" srcset="" class="gambar-produk">
                <p class="nama-barang">Sepatu Nike</p>
                <p class="harga-barang">Rp10.000</p>
            </div>
        </li>
        <li>
            <div class="produk">
                <img src="../img/sepatu.png" alt="" srcset="" class="gambar-produk">
                <p class="nama-barang">Sepatu Nike</p>
                <p class="harga-barang">Rp10.000</p>
            </div>
        </li>
    </ul>
</div>
</div>
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDMzbOwUZw-S8v7KzKj-d3-atmdr4nncE&callback=initMap&v=weekly"
async
></script>
<script src="../js/profilToko.js"></script>
@endsection