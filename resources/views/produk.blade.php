@extends('layouts.main')
@section('content')
    
<div class="profil-produk">
    <div class="foto-produk">
        <img src="../img/uploads/produk/{{ (isset($produk['foto'])?$produk['foto']:"") }}" alt="">
    </div>
    <div class="profil-toko">
        <div>
            <img src="../img/uploads/profile_images/{{ (isset($data->photo)?$data->photo:"") }}" alt="">
        </div>
        <div>
            <p class="nama-toko"><a href="/toko/{{ (isset($data->id)?$data->id:"") }}" class="nama-toko">{{ (isset($data->name)?$data->name:"") }}</a></p>
            <p class="nama-pengguna">{{ (isset($data->username)?"@".$data->username:"") }}</p>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span>(3)</span>
        </div>
    </div>
    <p class="louis fs-20">ID: #{{ (isset($produk['id'])?$produk['id']:"") }}</p>
</div>
<div class="split"></div>
<div class="deskripsi-produk">
    <p class="nama-produk">{{ (isset($produk['nama_produk'])?$produk['nama_produk']:"") }}</p>
    <p class="harga-produk">Rp{{ (isset($produk['harga'])?number_format($produk['harga'],0,',','.'):"") }}</p>
    @if (isset($produk['promo']))
        <p class="harga-produk">PROMO: Rp{{ number_format($produk['promo'],0,',','.') }}</p>
    @endif
    <pre class="montserrat fs-16">{{ (isset($produk['deskripsi'])?$produk['deskripsi']:"") }}</pre>
    <div>
        @if (session('dataUser')['id']!=$produk['id_penjual'])    
        <i class="fa fa-fw fa-comment-o fa-lg icon"></i>
        <i class="fa fa-fw fa-heart-o fa-lg icon  {{ ($wishlist?"red":"") }}" data-produk="{{ $produk['id'] }}" data-user="{{ session('dataUser')['id'] }}" data-id="{{ ($wishlist?$wishlist:"") }}"></i>
        @endif
        <i class="fa fa-fw fa-share-alt fa-lg icon"></i>
    </div>
    @if (session('dataUser')['id']!=$produk['id_penjual'])    
    <section>
        <button type="button" name="beli" id="beli"><a href="/checkout/{{ (isset($produk['id'])?$produk['id']:"") }}" class="beli">Beli</a></button>
        <button type="button" name="tawar" id="modal">Tawar</button>
    </section>
    @endif
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