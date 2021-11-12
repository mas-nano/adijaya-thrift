@extends('layouts.admin')
@section('content')
@php
    $kat = ['Sepatu', 'Tas', 'Jam Tangan', 'Baju', 'Baju Wanita', 'Handphone', 'Game Console', 'Sparepart'];
@endphp
    <div class="wrapper">
        <p class="montserrat fw-600 fs-36 ta-c">Ubah Data Produk</p>
        <div class="box pd-h-5">
            <form action="" method="post" class="wp-90 center">
                @csrf
                <div class="louis fs-20">
                    <div class="flex ai-c mg-v-2">
                        <label for="produk" class="flex-1">Nama Produk</label>
                        <div class="flex-5">
                            <input type="text" name="nama_produk" id="produk" value="{{ $produk->nama_produk }}" class="louis fs-20 input mwp-70">
                        </div>
                    </div>
                    <div class="flex ai-c mg-v-2">
                        <label for="kategori" class="flex-1">Kategori</label>
                        <div class="flex-5">
                            <select name="kategori" id="kategori"class="louis fs-20 input mwp-50">
                                <option value="">Pilih Kategori</option>
                                @foreach ($kat as $k)
                                <option value="{{ $k }}" {{ ($produk->kategori==$k?"selected":"") }}>{{ $k }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex ai-c mg-v-2">
                        <label for="deskripsi" class="flex-1">Deskripsi</label>
                        <div class="flex-5">
                            <textarea name="deskripsi" id="deskripsi" cols="50" rows="10"class="louis fs-20 br-18 pd-3">{{ $produk->deskripsi }}</textarea>
                        </div>
                    </div>
                    <div class="flex ai-c mg-v-2">
                        <label for="harga" class="flex-1">Harga</label>
                        <div class="flex-5">
                            <input type="text" name="harga" id="harga" value="{{ $produk->harga }}" class="louis fs-20 input mwp-50 bg-grey">
                        </div>
                    </div>
                    <div class="flex mg-v-2">
                        <label for="" class="flex-1">Foto Produk</label>
                        <div class="flex-5">
                            <img src="http://localhost:8000/img/uploads/produk/{{ $produk->foto }}" alt="" class="mw-500">
                        </div>
                    </div>
                    <div class="flex ai-c mg-v-2">
                        <label for="promo" class="flex-1">Promo</label>
                        <div class="flex-5">
                            <input type="text" name="promo" id="promo" value="{{ $produk->promo }}" class="louis fs-20 input mwp-50 bg-grey">
                        </div>
                    </div>
                </div>
            </div>
            @if (isset($data))
                @foreach ($data as $item)
                    @foreach ($item as $msg)
                        <p class="ta-c montserrat red">{{ $msg }}</p>
                    @endforeach
                @endforeach
            @endif
            <button type="submit" class="btn montserrat fw-600 fs-24 block mg-ha-v-3 bg-orange pointer">Ubah</button>
        </form>
    </div>
@endsection