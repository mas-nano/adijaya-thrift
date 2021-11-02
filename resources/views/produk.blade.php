@extends('layouts.main')
@section('content')
    
<div class="profil-produk">
    <div class="foto-produk">
        <img src="../img/sepatu.png" alt="">
    </div>
    <div class="profil-toko">
        <div>
            <img src="../img/phooo 1.png" alt="">
        </div>
        <div>
            <p class="nama-toko"><a href="/toko/1" class="nama-toko">Aulia Dewi</a></p>
            <p class="nama-pengguna">@auliadewi</p>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span>(3)</span>
        </div>
    </div>
    <p class="louis fs-20">ID: #0001</p>
</div>
<div class="split"></div>
<div class="deskripsi-produk">
    <p class="nama-produk">Sepatu Ngganteng</p>
    <p class="harga-produk">Rp10.000</p>
    <p class="montserrat fs-16">Produk sepatu nike dengan kondisi 90% pemakaian 2 kali. <br>
        Sepatu sudah dicuci dan siap dipakai. <br>
        Bonus dengan box dan paper bag asli.  <br>
        Warna hitam, lecet sedikit dibagian samping.<br>
        <br>
        Brand : Nike<br>
        Bahan : kulit<br>
        Size : 70<br>
        Tipe : casual<br>
        Import from Taiwan<br>
        Untuk lelaki dan wanita<br>
        Style code : 03493534<br>
        <br>
        Kualitas terbaik, harga terjangkau, foto asli 100% dan terpercaya.</p>
    <div>
        <i class="fa fa-fw fa-comment-o fa-lg"></i>
        <i class="fa fa-fw fa-heart-o fa-lg"></i>
        <i class="fa fa-fw fa-share-alt fa-lg"></i>
    </div>
    <section>
        <button type="button" name="beli" id="beli">Beli</button>
        <button type="button" name="tawar" id="modal">Tawar</button>
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
<script src="../js/produk.js"></script>
@endsection