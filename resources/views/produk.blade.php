@extends('layouts.main')
@section('content')
    
<div class="profil-produk">
    <div class="foto-produk">
        <img src="img/sepatu.png" alt="">
    </div>
    <div class="profil-toko">
        <div>
            <img src="img/phooo 1.png" alt="">
        </div>
        <div>
            <p class="nama-toko"><a href="/toko">Aulia Dewi</a></p>
            <p class="nama-pengguna">@auliadewi</p>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span>(3)</span>
        </div>
    </div>
</div>
<div class="split"></div>
<div class="deskripsi-produk">
    <p class="nama-produk">Sepatu Ngganteng</p>
    <p class="harga-produk">Rp10.000</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores quos tempore? Cumque et ducimus atque delectus quae? Esse soluta minima velit reprehenderit qui blanditiis ipsa commodi mollitia id ex.</p>
    <div>
        <i class="fa fa-fw fa-comment-o fa-lg"></i>
        <i class="fa fa-fw fa-heart-o fa-lg"></i>
        <i class="fa fa-fw fa-share-alt fa-lg"></i>
    </div>
    <section>
        <button type="button" name="beli" id="beli">Beli</button>
        <button type="button" name="tawar" id="tawar">Tawar</button>
    </section>
</div>
</div>
<div class="modal" id="modalBox">
    <div class="modalContent">
        <p class="close fa fa-chevron-left"></p>
        <p class="sub">Buat Penawaran</p>
        <form action="" method="POST">
            <input type="text" name="tawar" id="" placeholder="Masukkan Harga...">
            <button type="submit">Buat Penawaran</button>
        </form>
    </div>
</div>
<script src="js/produk.js"></script>
@endsection