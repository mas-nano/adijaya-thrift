@extends('layouts.main')
@section('content')
    
<div class="profil-toko">
    <div class="profil">
        <div>
            <img src="img/phooo 1.png" alt="">
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
        <a href="" class="atas terpilih">Review</a>
        <a href="" class="bawah">Produk</a>
    </div>
    <div class="wrapper-maps">
        <div id="maps">
        </div>
    </div>
</div>
<div class="split"></div>
<div class="ulasan">
    <div class="ulasan-wrap-luar">
        <div class="ulasan-wrap-dalam">
            <p class="heading">3 Ulasan Produk</p>
            <p class="subheading">3 dari 5 <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span></p>
            <hr>
            <div class="ulasan-rinci">
                <div>
                    <img src="img/phooo 1.png" alt="">
                </div>
                <div>
                    <p class="nama-pengguna">@nama_pengguna</p>
                    <p class="nama-produk">Sepatu Nike</p>
                    <p><span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span></p>
                    <p class="deskripsi-ulasan">Produk baik kualitas mantap</p>
                </div>
            </div>
            <hr>
            <div class="ulasan-rinci">
                <div>
                    <img src="img/phooo 1.png" alt="">
                </div>
                <div>
                    <p class="nama-pengguna">@nama_pengguna</p>
                    <p class="nama-produk">Sepatu Nike</p>
                    <p><span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span></p>
                    <p class="deskripsi-ulasan">Produk baik kualitas mantap</p>
                </div>
            </div>
            <hr>
            <div class="ulasan-rinci">
                <div>
                    <img src="img/phooo 1.png" alt="">
                </div>
                <div>
                    <p class="nama-pengguna">@nama_pengguna</p>
                    <p class="nama-produk">Sepatu Nike</p>
                    <p><span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span></p>
                    <p class="deskripsi-ulasan">Produk baik kualitas mantap</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDMzbOwUZw-S8v7KzKj-d3-atmdr4nncE&callback=initMap&v=weekly"
async
></script>
<script src="js/profilToko.js"></script>
@endsection