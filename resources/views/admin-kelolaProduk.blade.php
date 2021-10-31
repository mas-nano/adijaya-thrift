@extends('layouts.admin')
@section('content')
    <div class="wrapper">
        <p class="montserrat fw-600 fs-36 ta-c">Ubah Data Produk</p>
        <div class="box pd-h-5">
            <form action="" method="post" class="wp-90 center">
                <div class="louis fs-20">
                    <div class="flex ai-c mg-v-2">
                        <label for="produk" class="flex-1">Nama Produk</label>
                        <div class="flex-5">
                            <input type="text" name="produk" id="produk" value="Sepatu Nike" class="louis fs-20 input mwp-70">
                        </div>
                    </div>
                    <div class="flex ai-c mg-v-2">
                        <label for="kategori" class="flex-1">Kategori</label>
                        <div class="flex-5">
                            <select name="kategori" id="kategori"class="louis fs-20 input mwp-50">
                                <option value="Sepatu">Sepatu</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex ai-c mg-v-2">
                        <label for="deskripsi" class="flex-1">Deskripsi</label>
                        <div class="flex-5">
                            <textarea name="deskripsi" id="deskripsi" cols="50" rows="10"class="louis fs-20 br-18 pd-3">Produk sepatu nike dengan kondisi 90% pemakaian 2 kali. 
Sepatu sudah dicuci dan siap dipakai. 
Bonus dengan box dan paper bag asli.  
Warna hitam, lecet sedikit dibagian samping.
                            
Brand : Nike
Bahan : kulit
Size : 70
Tipe : casual
                                </textarea>
                        </div>
                    </div>
                    <div class="flex ai-c mg-v-2">
                        <label for="harga" class="flex-1">Harga</label>
                        <div class="flex-5">
                            <input type="text" name="harga" id="harga" value="250000" class="louis fs-20 input mwp-50 bg-grey">
                        </div>
                    </div>
                    <div class="flex mg-v-2">
                        <label for="" class="flex-1">Foto Produk</label>
                        <div class="flex-5">
                            <input type="file" name="foto" id="foto" class="block louis fs-20">
                            <img src="../img/sepatu.png" alt="">
                        </div>
                    </div>
                    <div class="flex ai-c mg-v-2">
                        <label for="promo" class="flex-1">Promo</label>
                        <div class="flex-5">
                            <input type="text" name="promo" id="promo" value="" class="louis fs-20 input mwp-50 bg-grey">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn montserrat fw-600 fs-24 block mg-ha-v-3 bg-orange">Ubah</button>
        </form>
    </div>
@endsection