@extends('layouts.main')
@section('content')
<input type="hidden" name="" id="_token" value="{{ csrf_token() }}">
<div class="profil-produk">
    <div class="foto-produk">
        <img src="{{ app('firebase.storage')->getBucket()->object("img/produk/".$produk['foto'])->signedUrl(new \DateTime('tomorrow')) }}" alt="">
    </div>
    <div class="profil-toko">
        <div>
            <img src="{{ app('firebase.storage')->getBucket()->object("img/profil/".$data->photo)->signedUrl(new \DateTime('tomorrow')) }}" alt="">
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
    <p class="harga-produk fs-32">Rp<strike>{{ (isset($produk['harga'])?number_format($produk['harga'],0,',','.'):"") }}</strike></p>
    <p class="harga-produk fs-34 orange"><b>Rp{{ number_format($produk['promo'],0,',','.') }}</b></p>
    @else
    <p class="harga-produk fs-32">Rp{{ (isset($produk['harga'])?number_format($produk['harga'],0,',','.'):"") }}</p>
        @endif
    <p class="harga-produk"><b>Deskripsi :</b></p>
    <textarea class="montserrat fs-16 mw" disabled>{{ (isset($produk['deskripsi'])?$produk['deskripsi']:"") }}</textarea>
    <div>
        @if (session('dataUser'))
            @if (session('dataUser')['id']!=$produk['id_penjual'])
            <input type="hidden" name="" id="_token" value="{{ csrf_token() }}">
            <i class="far fa-comment-alt fa-lg icon" data-id="{{ $produk['id'] }}"></i>
            <i class="{{ $wishlist?"fas":"far" }} fa-heart fa-lg icon  {{ ($wishlist?"orange":"") }}" data-produk="{{ $produk['id'] }}" data-user="{{ session('dataUser')['id'] }}" data-id="{{ ($wishlist?$wishlist:"") }}"></i>
            @endif
        @endif
        <input type="hidden" name="" id="link" value="{{ url()->full() }}">
        <i class="fa fa-fw fa-share-alt fa-lg icon" id="share"></i>
    </div>
    <section>
    @if (session("dataUser"))
        @if (session('dataUser')['id']!=$produk['id_penjual'])    
            <button type="button" name="beli" id="beli"><a href="/checkout/{{ (isset($produk['id'])?$produk['id']:"") }}" class="beli">Beli</a></button>
            <button type="button" name="tawar" id="tawar">Tawar</button>
        @endif
    @else
    <button type="button" name="beli" id="beli"><a href="/login" class="beli">Beli</a></button>
    @endif
    </section>
</div>
</div>
<div class="modal" id="modalBox">
    <div class="modalContent">
        <div id="fb-root"></div>
        <p class="close fa fa-chevron-left"></p>
        <form action="" method="POST">
            @csrf
            <div class="fill">
                <p class="sub">Buat Penawaran</p>
                <input type="text" name="nominal" id="" placeholder="Masukkan Harga...">
                <button type="submit">Buat Penawaran</button>
            </div>
        </form>
    </div>
</div>
<div class="modal" id="modalShare">
    <div class="modalContent">
        <div id="fb-root"></div>
        <p class="close fa fa-chevron-left"></p>
        <form action="" method="POST">
            @csrf
            <div class="fill">
                <p class="sub">Bagikan ke</p>
                <div class="flex ai-center jc-sa mt-1">
                    <i class="fas fa-link fa-5x icon"></i>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->full() }}" class="td-0 black" target="_blank">
                    <i class="fab fa-facebook-square fa-5x"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Flocalhost%3A8000%2F&ref_src=twsrc%5Etfw%7Ctwcamp%5Ebuttonembed%7Ctwterm%5Eshare%7Ctwgr%5E&text={{ $title }}%20-%20Adijaya%20Thrift&url={{ url()->full() }}" target="_blank"><i class="fab fa-twitter-square fa-5x td-0 black"></i></a>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal" id="modalLoading">
    <div class="modalLoading">
        <div class="wraploading">
            <div class="dot-elastic"></div>
        </div>
    </div>
</div>
<script src="{{ asset('js/produk.js') }}"></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v12.0" nonce="OuhrkDs0"></script>
@endsection