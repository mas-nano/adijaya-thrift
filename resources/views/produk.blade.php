@extends('layouts.main')
@section('content')
    
<div class="profil-produk">
    <div class="foto-produk">
        <img src="{{ asset('img/uploads/produk/'.$produk['foto']) }}" alt="">
    </div>
    <div class="profil-toko">
        <div>
            <img src="{{ asset('img/uploads/profile_images/'.$data->photo) }}" alt="">
        </div>
        <div>
            <p class="nama-toko"><a href="/toko/{{ (isset($data->id)?$data->id:"") }}" class="nama-toko">{{ (isset($data->name)?$data->name:"") }}</a></p>
            <p class="nama-pengguna">{{ (isset($data->username)?"@".$data->username:"") }}</p>
            @for ($j = 1; $j <= 5; $j++)
                <i class="{{ ($j<=$rating?"fas":"far") }} fa-star checked"></i>
            @endfor
        </div>
    </div>
    <p class="louis fs-20">ID: #{{ (isset($produk['id'])?$produk['id']:"") }}</p>
</div>
<div class="split"></div>
<div class="deskripsi-produk">
    <p class="nama-produk">{{ (isset($produk['nama_produk'])?$produk['nama_produk']:"") }}</p>
    @if (isset($produk['promo']))
    <p class="harga-produk fs-16">Rp<strike>{{ (isset($produk['harga'])?number_format($produk['harga'],0,',','.'):"") }}</strike></p>
    <p class="harga-produk fs-18 orange"><b>Rp{{ number_format($produk['promo'],0,',','.') }}</b></p>
    @else
    <p class="harga-produk fs-16">Rp{{ (isset($produk['harga'])?number_format($produk['harga'],0,',','.'):"") }}</p>
        @endif
    <pre class="montserrat fs-16">{{ (isset($produk['deskripsi'])?$produk['deskripsi']:"") }}</pre>
    <div>
        @if (session('dataUser'))
            @if (session('dataUser')['id']!=$produk['id_penjual'])
            <input type="hidden" name="" id="_token" value="{{ csrf_token() }}">
            <i class="far fa-comment-alt fa-lg icon" data-id="{{ $produk['id'] }}"></i>
            <i class="far fa-heart fa-lg icon  {{ ($wishlist?"red":"") }}" data-produk="{{ $produk['id'] }}" data-user="{{ session('dataUser')['id'] }}" data-id="{{ ($wishlist?$wishlist:"") }}"></i>
            @endif
        @endif
        <input type="hidden" name="" id="link" value="{{ url()->full() }}">
        <i class="fa fa-fw fa-share-alt fa-lg icon" id="share"></i>
    </div>
    <section>
    @if (session("dataUser"))
        @if (session('dataUser')['id']!=$produk['id_penjual'])    
            <button type="button" name="beli" id="beli"><a href="/checkout/{{ (isset($produk['id'])?$produk['id']:"") }}" class="beli">Beli</a></button>
            <button type="button" name="tawar" id="modal">Tawar</button>
        @endif
    @else
    <button type="button" name="beli" id="beli"><a href="/login" class="beli">Beli</a></button>
    @endif
    </section>
</div>
</div>
<div class="modal" id="modalBox">
    <div class="modalContent">
        <p class="close fa fa-chevron-left"></p>
        <p class="sub">Buat Penawaran</p>
        <form action="" method="POST">
            @csrf
            <input type="text" name="nominal" id="" placeholder="Masukkan Harga...">
            <button type="submit">Buat Penawaran</button>
        </form>
    </div>
</div>
<script src="{{ asset('js/produk.js') }}"></script>
<script>
    $("#share").click(function(){
        let copy = $("#link")
        copy.select()
        navigator.clipboard.writeText(copy.val())
        alert("Link telah disalin ke papan klip")
    })
</script>
@endsection