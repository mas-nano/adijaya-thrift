@extends('layouts.main')
@section('content')
<form action="" method="post" class="form-input" enctype="multipart/form-data">
    @csrf
    <div class="wrapper">
        <div class="wrap">
            <label for="nama_produk">Nama Produk*</label>
            <div class="">
                <input type="text" name="nama_produk" id="nama-produk" class="produk" value="{{ (isset($data['nama_produk'])?$data['nama_produk']:"") }}">
            </div>
        </div>
        <div class="wrap">
            <label for="kategori">Kategori*</label>
            <div class="">
                <select name="kategori" id="kategori" class="produk">
                    <option value="">Pilih Kategori</option>
                    <option value="Sepatu" {{ (isset($data['kategori'])&&$data['kategori']=='Sepatu'?'selected':'') }}>Sepatu</option>
                    <option value="Tas" {{ (isset($data['kategori'])&&$data['kategori']=='Tas'?'selected':'') }}>Tas</option>
                    <option value="Jam Tangan" {{ (isset($data['kategori'])&&$data['kategori']=='Jam Tangan'?'selected':'') }}>Jam Tangan</option>
                    <option value="Baju" {{ (isset($data['kategori'])&&$data['kategori']=='Baju'?'selected':'') }}>Baju</option>
                    <option value="Baju Wanita" {{ (isset($data['kategori'])&&$data['kategori']=='Baju Wanita'?'selected':'') }}>Baju Wanita</option>
                    <option value="Handphone" {{ (isset($data['kategori'])&&$data['kategori']=='Handphone'?'selected':'') }}>Handphone</option>
                    <option value="Game Console" {{ (isset($data['kategori'])&&$data['kategori']=='Game Console'?'selected':'') }}>Permainan Konsol</option>
                    <option value="Sparepart" {{ (isset($data['kategori'])&&$data['kategori']=='Sparepart'?'selected':'') }}>Sparepart</option>
                    <option value="Lainya" {{ (isset($data['kategori'])&&$data['kategori']=='Lainya'?'selected':'') }}>Lainnya</option>
                </select>
            </div>
        </div>
        <div class="wrap">
            <label for="deskripsi">Deskripsi*</label>
            <div class="">
                <textarea name="deskripsi" id="deskripsi" cols="33" rows="10" class="desk">{{ (isset($data['deskripsi'])?$data['deskripsi']:"") }}</textarea>
            </div>
        </div>
        <div class="wrap">
            <label for="harga">Harga*</label>
            <div class="">
                <input type="number" name="harga" id="harga" class="inp" value="{{ (isset($data['harga'])?$data['harga']:"") }}">
            </div>
        </div>
        <div class="wrap">
            <label for="foto">Foto Produk*</label>
            <div class="">
                <input type="file" name="foto" id="foto" style="display: block">
                @if (isset($data['foto']))
                    
                <img src="{{ app('firebase.storage')->getBucket()->object("img/produk/".$data['foto'])->signedUrl(new \DateTime('tomorrow')) }}" alt="" class="fotoProduk">
                @endif
            </div>
        </div>
        <div class="wrap">
            <label for="promo">Promo</label>
            <div class="">
                <input type="number" name="promo" id="promo" class="inp" value="{{ (isset($data['promo'])?$data['promo']:"") }}">
            </div>
        </div>
        <div class="wrap">
            <label for="berat">Berat (Kg)*</label>
            <div class="">
                <input type="number" name="berat" id="berat" class="inp" value="{{ (isset($data['berat'])?$data['berat']:"") }}">
            </div>
        </div>
        <div class="wrap">
            <label for="stok">Stok*</label>
            <div class="">
                <input type="number" name="stok" id="stok" class="inp" value="{{ (isset($data['stok'])?$data['stok']:"") }}">
            </div>
        </div>
    </div>
    @if (isset($data['id']))
        <button type="submit" name="simpan" id="simpan" class="unggah">Simpan</button>
    @else
        <button type="submit" name="unggah" id="unggah" class="unggah">Unggah</button>
    @endif
    @if (isset($gambar))
        <p class="warn">{{ $gambar }}</p>
    @endif
    @if (isset($message))
        @foreach ($message as $item)
            @foreach ($item as $msg)
            <div class="warn">
                <p class="center">{{ $msg }}</p>
            </div>
            
            @endforeach
        @endforeach
    @endif
</form>

@endsection