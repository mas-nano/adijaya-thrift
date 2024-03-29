@extends('layouts.main')
@section('content')
<div class="wrapper">

    <div class="filter">
        <form action="" method="get">
            @if (request('promo'))
                <input type="hidden" name="promo" id="promo" value="true">
            @endif
            @if (request('search'))
                <input type="hidden" name="search" id="search" value="{{ request('search') }}">
            @endif
            <p>Kategori</p>
                <select name="kategori" id="kategori">
                    <option value="">Pilih Kategori</option>
                    <option value="Sepatu">Sepatu</option>
                    <option value="Tas">Tas</option>
                    <option value="Jam Tangan">Jam Tangan</option>
                    <option value="Baju">Baju</option>
                    <option value="Baju Wanita">Baju Wanita</option>
                    <option value="Handphone">Handphone</option>
                    <option value="Game Console">Permainan Konsol</option>
                    <option value="Sparepart">Sparepart</option>
                    <option value="Lainya">Lainnya</option>
                </select>
                <select name="sort" id="sort">
                    <option value="">Urutkan</option>
                    <option value="Terbaru">Terbaru</option>
                    <option value="Terpopuler">Terpopuler</option>
                </select>
            <p>Pilih Provinsi</p>
                <select name="daerah" id="daerah">
                    <option value="">Pilih Provinsi</option>
                    @for ($i = 0; $i < count($data); $i++)
                    <option value="{{ $data[$i]['name'] }}">{{ $data[$i]['name'] }}</option>
                    @endfor
                </select>
            <p>Harga</p>
            <input type="text" name="min" id="min" placeholder="Minimal" value="">
            <input type="text" name="max" id="max" placeholder="Maksimal" value="">
            <button type="submit" class="btn-filter">Pilih</button>
        </form>
    </div>
    <div class="container-hasil">
        @if (request('search'))
            <p class="hasil-text">Hasil pencarian dari "{{ request('search') }}"</p>
        @elseif (request('promo'))
            <p class="hasil-text">Promo</p>
        @else
            <p class="hasil-text">Produk</p>
        @endif
        <div class="hasil">
        </div>
        <div class="more">
            <a href="">Lihat Lebih Banyak</a>
        </div>
    </div>
</div>
<script src="{{ asset('js/search.js') }}"></script>
@endsection