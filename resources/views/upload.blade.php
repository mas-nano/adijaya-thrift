@extends('layouts.main')
@section('content')
<form action="" method="post" class="form-input">
    <div class="wrapper">
        <div class="wrap">
            <label for="nama-produk">Nama Produk</label>
            <div class="">
                <input type="text" name="nama-produk" id="nama-produk" class="inp">
            </div>
        </div>
        <div class="wrap">
            <label for="kategori">Kategori</label>
            <div class="">
                <select name="kategori" id="kategori" class="inp">
                    <option value="Sepeda">Sepeda</option>
                    <option value="Sepatu">Sepatu</option>
                    <option value="Tas">Tas</option>
                    <option value="Celana">Celana</option>
                </select>
            </div>
        </div>
        <div class="wrap">
            <label for="deskripsi">Deskripsi</label>
            <div class="">
                <textarea name="deskripsi" id="deskripsi" cols="33" rows="10"></textarea>
            </div>
        </div>
        <div class="wrap">
            <label for="harga">Harga</label>
            <div class="">
                <input type="number" name="harga" id="harga" class="inp">
            </div>
        </div>
        <div class="wrap">
            <label for="foto">Foto Produk</label>
            <div class="">
                <input type="file" name="foto" id="foto">
            </div>
        </div>
        <div class="wrap">
            <label for="promo">Promo</label>
            <div class="">
                <input type="number" name="promo" id="promo" class="inp">
            </div>
        </div>
    </div>
    <button type="submit" name="unggah" id="unggah">Unggah</button>
</form>
@endsection