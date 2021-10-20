@extends('layouts.admin')
@section('content')
    <div class="wrapper">
        <p class="montserrat fs-30 ta-c fw-600">Tambah Data Pengguna</p>
        <p class="montserrat fs-30 ta-c fw-600">Ubah Data Pengguna</p>
        <div class="box pd-h-5">
            <form action="" method="post" class="wp-50 center">
                <label for="nama" class="block montserrat fs-16 fw-600 mg-t-3">Nama</label>
                <input type="text" name="nama" id="nama" class="block input bg-grey montserrat fs-16 fw-600">
                <label for="idAdmin" class="block montserrat fs-16 fw-600 mg-t-3">ID Admin</label>
                <input type="text" name="idAdmin" id="idAdmin" class="block input bg-grey montserrat fs-16 fw-600">
                <label for="email" class="block montserrat fs-16 fw-600 mg-t-3">Email</label>
                <input type="email" name="email" id="email" class="block input bg-grey montserrat fs-16 fw-600">
                <label for="password" class="block montserrat fs-16 fw-600 mg-t-3">Kata Sandi</label>
                <input type="text" name="password" id="password" class="block input bg-grey montserrat fs-16 fw-600">
                <button type="submit" class="block mg-ha-v-3 btn bg-orange montserrat fs-16 fw-600 pointer ">Tambah</button>
                <button type="submit" class="block mg-ha-v-3 btn bg-orange montserrat fs-16 fw-600 pointer ">Simpan</button>
            </form>
        </div>
    </div>
@endsection