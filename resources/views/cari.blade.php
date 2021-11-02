@extends('layouts.main')
@section('content')
<div class="wrapper">

    <div class="filter">
        <form action="" method="get">
            @if ($title == 'Promo')
                <input type="hidden" name="promo" value="true">
            @endif
            @if (isset($res['s']))
                <input type="hidden" name="s" value="{{ $res['s'] }}">
            @endif
            <p>Kategori</p>
                <select name="kategori" id="kategori">
                    <option value="">Pilih Kategori</option>
                    <option value="Sepatu" {{ (isset($res['kategori'])&&$res['kategori']=='Sepatu'?'selected':'') }}>Sepatu</option>
                    <option value="Tas" {{ (isset($res['kategori'])&&$res['kategori']=='Tas'?'selected':'') }}>Tas</option>
                    <option value="Jam Tangan" {{ (isset($res['kategori'])&&$res['kategori']=='Jam Tangan'?'selected':'') }}>Jam Tangan</option>
                    <option value="Baju" {{ (isset($res['kategori'])&&$res['kategori']=='Baju'?'selected':'') }}>Baju</option>
                    <option value="Baju Wanita" {{ (isset($res['kategori'])&&$res['kategori']=='Baju Wanita'?'selected':'') }}>Baju Wanita</option>
                    <option value="Handphone" {{ (isset($res['kategori'])&&$res['kategori']=='Handphone'?'selected':'') }}>Handphone</option>
                    <option value="Game Console" {{ (isset($res['kategori'])&&$res['kategori']=='Game Console'?'selected':'') }}>Game Console</option>
                    <option value="Sparepart" {{ (isset($res['kategori'])&&$res['kategori']=='Sparepart'?'selected':'') }}>Sparepart</option>
                </select>
                <select name="sort" id="sort">
                    <option value="">Urutkan</option>
                    <option value="Terbaru" {{ (isset($res['sort'])&&$res['sort']=='Terbaru'?'selected':'') }}>Terbaru</option>
                    <option value="Terlama" {{ (isset($res['sort'])&&$res['sort']=='Terlama'?'selected':'') }}>Terpopuler</option>
                </select>
            <p>Pilih Provinsi</p>
                <select name="daerah" id="daerah">
                    <option value="">Pilih Provinsi</option>
                    @for ($i = 0; $i < count($data['provinsi']); $i++)
                    <option value="{{ $data['provinsi'][$i]['nama'] }}" {{ (isset($res['daerah'])&&$res['daerah']==$data['provinsi'][$i]['nama']?'selected':'') }}>{{ $data['provinsi'][$i]['nama'] }}</option>
                    @endfor
                </select>
            <p>Harga</p>
            <input type="text" name="minimal" id="minimal" placeholder="Minimal">
            <input type="text" name="maksimal" id="maksimal" placeholder="Maksimal">
            <button type="submit" class="btn-filter">Pilih</button>
        </form>
    </div>
    <div class="container-hasil">
        @if ($title == 'Cari')
            <p class="hasil-text">Hasil pencarian dari "{{ $res['s'] }}"</p>
        @elseif ($title == 'Promo')
            <p class="hasil-text">Promo</p>
        @else
            <p class="hasil-text">Produk</p>
        @endif
        <ul class="hasil">
            <li>
                <div class="produk">
                    <img src="img/sepatu.png" alt="" srcset="" class="gambar-produk">
                    <p class="nama-barang">Sepatu Nike</p>
                    <p class="harga-barang">Rp10.000</p>
                </div>
            </li>
            <li>
                <div class="produk">
                    <img src="img/sepatu.png" alt="" srcset="" class="gambar-produk">
                    <p class="nama-barang">Sepatu Nike</p>
                    <p class="harga-barang">Rp10.000</p>
                </div>
            </li>
            <li>
                <div class="produk">
                    <img src="img/sepatu.png" alt="" srcset="" class="gambar-produk">
                    <p class="nama-barang">Sepatu Nike</p>
                    <p class="harga-barang">Rp10.000</p>
                </div>
            </li>
            <li>
                <div class="produk">
                    <img src="img/sepatu.png" alt="" srcset="" class="gambar-produk">
                    <p class="nama-barang">Sepatu Nike</p>
                    <p class="harga-barang">Rp10.000</p>
                </div>
            </li>
            <li>
                <div class="produk">
                    <img src="img/sepatu.png" alt="" srcset="" class="gambar-produk">
                    <p class="nama-barang">Sepatu Nike</p>
                    <p class="harga-barang">Rp10.000</p>
                </div>
            </li>
            <li>
                <div class="produk">
                    <img src="img/sepatu.png" alt="" srcset="" class="gambar-produk">
                    <p class="nama-barang">Sepatu Nike</p>
                    <p class="harga-barang">Rp10.000</p>
                </div>
            </li>
            <li>
                <div class="produk">
                    <img src="img/sepatu.png" alt="" srcset="" class="gambar-produk">
                    <p class="nama-barang">Sepatu Nike</p>
                    <p class="harga-barang">Rp10.000</p>
                </div>
            </li>
        </ul>
        <div class="more">
            <a href="">Lihat Lebih Banyak</a>
        </div>
    </div>
</div>
@endsection