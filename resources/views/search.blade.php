@extends('layouts.main')
@section('content')

            <div class="filter">
                <form action="" method="post">
                    <p>Kategori</p>
                        <select name="kategori" id="kategori">
                            <option value="Sepatu">Sepatu</option>
                            <option value="Baju">Baju</option>
                            <option value="Celana">Celana</option>
                            <option value="Kaos">Kaos</option>
                        </select>
                        <select name="sort" id="sort">
                            <option value="Terbaru">Terbaru</option>
                            <option value="Terlama">Terlama</option>
                            <option value="Terendah">Terendah</option>
                            <option value="Tertinggi">Tertinggi</option>
                        </select>
                    <p>Pilih Daerah</p>
                        <select name="daerah" id="daerah">
                            <option value="Jawa Timur">Jawa Timur</option>
                            <option value="Jawa tengah">Jawa tengah</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                            <option value="DKI Jakarta">DKI Jakarta</option>
                        </select>
                    <p>Harga</p>
                    <input type="text" name="minimal" id="minimal" placeholder="Minimal">
                    <input type="text" name="maksimal" id="maksimal" placeholder="Maksimal">
                    <button type="submit" class="btn-filter">Pilih</button>
                </form>
            </div>
            <div class="container-hasil">
                <p class="hasil-text">Hasil pencarian dari "Sepatu"</p>
                <ul class="hasil">
                    <li>
                        <div class="produk">
                            <img src="img/sepatu.png" alt="" srcset="" class="gambar-produk">
                            <p class="nama-barang">Sepatu Ngganteng</p>
                            <p class="harga-barang">Rp10.000</p>
                            <img src="img/love.png" alt="" class="like">
                        </div>
                    </li>
                    <li>
                        <div class="produk">
                            <img src="img/sepatu.png" alt="" srcset="" class="gambar-produk">
                            <p class="nama-barang">Sepatu Ngganteng</p>
                            <p class="harga-barang">Rp10.000</p>
                            <img src="img/love.png" alt="" class="like">
                        </div>
                    </li>
                    <li>
                        <div class="produk">
                            <img src="img/sepatu.png" alt="" srcset="" class="gambar-produk">
                            <p class="nama-barang">Sepatu Ngganteng</p>
                            <p class="harga-barang">Rp10.000</p>
                            <img src="img/love.png" alt="" class="like">
                        </div>
                    </li>
                    <li>
                        <div class="produk">
                            <img src="img/sepatu.png" alt="" srcset="" class="gambar-produk">
                            <p class="nama-barang">Sepatu Ngganteng</p>
                            <p class="harga-barang">Rp10.000</p>
                            <img src="img/love.png" alt="" class="like">
                        </div>
                    </li>
                    <li>
                        <div class="produk">
                            <img src="img/sepatu.png" alt="" srcset="" class="gambar-produk">
                            <p class="nama-barang">Sepatu Ngganteng</p>
                            <p class="harga-barang">Rp10.000</p>
                            <img src="img/love.png" alt="" class="like">
                        </div>
                    </li>
                    <li>
                        <div class="produk">
                            <img src="img/sepatu.png" alt="" srcset="" class="gambar-produk">
                            <p class="nama-barang">Sepatu Ngganteng</p>
                            <p class="harga-barang">Rp10.000</p>
                            <img src="img/love.png" alt="" class="like">
                        </div>
                    </li>
                    <li>
                        <div class="produk">
                            <img src="img/sepatu.png" alt="" srcset="" class="gambar-produk">
                            <p class="nama-barang">Sepatu Ngganteng</p>
                            <p class="harga-barang">Rp10.000</p>
                            <img src="img/love.png" alt="" class="like">
                        </div>
                    </li>
                </ul>
                <div class="more">
                    <a href="">Lihat Lebih Banyak</a>
                </div>
            </div>
        </div>
@endsection