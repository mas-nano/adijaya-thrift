@extends('layouts.main')
@section('content')
    <div class="wrapper">
        <div class="left">
            <div class="profil">
                <div>
                    <img src="img/uploads/profile_images/{{ (session('dataUser')['gambar']?session('dataUser')['gambar']:"phooo 1.png") }}" alt="">
                </div>
                <div>
                    <p class="nama-toko">{{ session('dataUser')['nama'] }}</p>
                    <p class="nama-pengguna">{{ '@'.session('dataUser')['username'] }}</p>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span>(3)</span>
                </div>
            </div>
            <div class="pilihan">
                <div>
                    <a href="/akun" class="atas">Edit Profil</a>
                    <a href="" class="terpilih">Riwayat</a>
                    <a href="/penjualan" class="">Penjualan</a>
                    <a href="/whislist" class="">Wishlist</a>
                    <a href="/chat" class="bawah">Pesan</a>
                </div>
            </div>
            <div class="center">
                <p class="link">Profil</p>
                <p><i class="fa fa-sign-out" aria-hidden="true"></i><a class="link" href="/logout"> Keluar</a></p>
            </div>
        </div>
        <div class="split"></div>
        <div class="right">
            <div class="box-radius-18">
                <div class="width-90">
                    <input type="hidden" name="" id="user_id" value="{{ session('dataUser')['id'] }}">
                    <p class="sub montserrat-18">Status</p>
                    <select name="filter" id="filter" class="dropdown">
                        <option value="">Filter</option>
                        <option value="Selesai">Selesai</option>
                        <option value="Telah Dikonfirmasi">Telah Dikonfirmasi</option>
                        <option value="Konfirmasi Admin">Konfirmasi Admin</option>
                    </select>
                    <div id="produk">
                        
                    </div>
                </div>
            </div>
            <div class="box-radius-18">
                <div class="width-90">
                    <p class="sub montserrat-18">Penawaran</p>
                    <select name="f-tawar" id="f-tawar" class="dropdown">
                        <option value="">Filter</option>
                        <option value="Ditolak">Ditolak</option>
                        <option value="Diterima">Diterima</option>
                    </select>
                    <div class="status-produk">
                        <img src="img/sepatu.png" alt="">
                        <div class="flex-5 mg-l-3">
                            <p class="louis-16">Sepatu Nike</p>
                            <p class="louis-16 green">Diterima</p>
                        </div>
                        <p class="flex-5 align-r louis-16">Detail</p>
                    </div>
                    <div class="status-produk">
                        <img src="img/sepatu.png" alt="">
                        <div class="flex-5 mg-l-3">
                            <p class="louis-16">Sepatu Nike</p>
                            <p class="louis-16 red">Ditolak</p>
                        </div>
                        <p class="flex-5 align-r louis-16"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/riwayat.js"></script>
@endsection