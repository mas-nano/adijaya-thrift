@extends('layouts.main')
@section('content')
    <div class="wrapper">
        <div class="left">
            <div class="profil">
                <div>
                    <img src="{{ app('firebase.storage')->getBucket()->object("img/profil/".session('dataUser')['gambar'])->signedUrl(new \DateTime('tomorrow')) }}" alt="">
                </div>
                <div>
                    <p class="nama-toko">{{ session('dataUser')['nama'] }}</p>
                    <p class="nama-pengguna">{{ '@'.session('dataUser')['username'] }}</p>
                    @for ($j = 1; $j <= 5; $j++)
                        <i class="{{ ($j<=$rating?"fas":"far") }} fa-star checked"></i>
                    @endfor
                </div>
            </div>
            <div class="pilihan">
                <div>
                    <a href="/akun" class="atas">Edit Profil</a>
                    <a href="" class="terpilih">Riwayat</a>
                    <a href="/penjualan" class="">Penjualan</a>
                    <a href="/wishlist" class="">Disukai</a>
                    <a href="/chat" class="bawah">Pesan</a>
                    <a href="/toko/{{ session('dataUser')['id'] }}">Profil</a>
                    <a class="link" href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Keluar</a>
                </div>
            </div>
        </div>
        <div class="split"></div>
        <div class="right">
            <div class="box-radius-18">
                <div class="width-90">
                    <input type="hidden" name="" id="user_id" value="{{ session('dataUser')['id'] }}">
                    <p class="sub montserrat-18">Status</p>
                    <select name="filter" id="filter" class="daftar">
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
                    <select name="f-tawar" id="f-tawar" class="daftar">
                        <option value="">Filter</option>
                        <option value="Ditolak">Ditolak</option>
                        <option value="Diterima">Diterima</option>
                    </select>
                    <div id="tawar">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/riwayat.js') }}"></script>
@endsection