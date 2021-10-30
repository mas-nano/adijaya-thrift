@extends('layouts.main')
@section('content')
    <div class="wrapper">
        <div class="left">
            <div class="profil">
                <div>
                    <img src="img/phooo 1.png" alt="">
                </div>
                <div>
                    <p class="nama-toko">Laras Wahyu</p>
                    <p class="nama-pengguna">@laraswahyu</p>
                </div>
            </div>
            <div class="pilihan">
                <div>
                    <a href="" class="atas terpilih">Edit Profil</a>
                    <a href="/riwayat" class="">Riwayat</a>
                    <a href="/penjualan" class="">Penjualan</a>
                    <a href="wishlist" class="">Wishlist</a>
                    <a href="/chat" class="bawah">Pesan</a>
                </div>
            </div>
            <div class="center">
                <p class="link">Profil</p>
                <p><i class="fa fa-sign-out" aria-hidden="true"></i><span class="link"> Keluar</span></p>
            </div>
        </div>
        <div class="split"></div>
        <div class="right">
            <form action="" method="post">
                <div class="flex-center">
                    <img src="img/phooo 1.png" alt="" class="img-change">
                    <button class="btn-foto" type="button">Unggah Foto</button>
                    <input type="text" id="file-name" disabled>
                    <input type="file" name="foto" id="foto" style="display: none;">
                </div>
                <hr>
                <div class="width-45">
                    <label for="nama" class="block">Nama</label>
                    <input type="text" id="nama" class="block input" name="nama">
                    <label for="username" class="block">Nama Pengguna</label>
                    <input type="text" id="username" class="block input" name="username">
                    <label for="email" class="block">Email</label>
                    <input type="email" id="email" class="block input" name="email">
                    <label for="password" class="block">Kata Sandi</label>
                    <input type="password" id="password" class="block input" name="password">
                    <label for="ponsel" class="block">Ponsel</label>
                    <input type="text" id="ponsel" class="block input">
                    <label for="bank" class="block">Bank</label>
                    <input type="text" name="bank" id="bank" class="block input">
                    <label for="rekening" class="block">Nomor Rekening</label>
                    <input type="text" id="rekening" class="block input">
                    <label for="pemilik" class="block">Nama Lengkap Pemilik</label>
                    <input type="text" id="pemilik" class="block input">
                    <label for="alamat" class="block">Alamat</label>
                    <input type="text" id="alamat" class="block input">
                    <label for="provinsi" class="block">Provinsi</label>
                    <select name="provinsi" id="provinsi" class="block">
                        <option value="Jawa Timur">Jawa Timur</option>
                        <option value="Jawa Tengah">Jawa Tengah</option>
                        <option value="Jawa Barat">Jawa Barat</option>
                    </select>
                    <label for="kota" class="block">Kota</label>
                    <select name="kota" id="kota" class="block">
                        <option value="Surabaya">Surabaya</option>
                        <option value="Solo">Solo</option>
                        <option value="Bandung">Bandung</option>
                    </select>
                    <label for="" class="block">Maps</label>
                        <div id="maps">
    
                        </div>
                </div>
                <button type="submit" class="btn-simpan">Simpan</button>
            </form>
        </div>
    </div>
    <script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDMzbOwUZw-S8v7KzKj-d3-atmdr4nncE&callback=initMap&v=weekly"
async
></script>
    <script src="js/edit-akun.js"></script>
@endsection