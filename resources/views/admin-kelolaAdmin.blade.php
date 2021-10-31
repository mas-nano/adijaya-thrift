@extends('layouts.admin')
@section('content')
    <div class="wrapper">
        <p class="montserrat fs-30 ta-c fw-600">Tambah Data Pengguna</p>
        <p class="montserrat fs-30 ta-c fw-600">Ubah Data Pengguna</p>
        <p class="montserrat fs-30 ta-c fw-600">Tambah Data Admin</p>
        <p class="montserrat fs-30 ta-c fw-600">Ubah Data Admin</p>
        <div class="box pd-h-5">
            <form action="" method="post" class="wp-50 center">
                <div class="flex ai-c">
                    <img src="../img/phooo 1.png" alt="" class="img">
                    <button class="btn-foto mg-l-3 pointer bg-white" type="button">Unggah Foto</button>
                    <input type="text" id="file-name" disabled>
                    <input type="file" name="foto" id="foto" style="display: none;">
                </div>
                <hr>
                {{-- always --}}
                <label for="nama" class="block montserrat fs-16 fw-600 mg-t-3">Nama</label>
                <input type="text" name="nama" id="nama" class="block input bg-grey montserrat fs-16 fw-600">
                {{-- tambah user --}}
                <label for="tel" class="block montserrat fs-16 fw-600 mg-t-3">Nomor Ponsel</label>
                <input type="text" name="tel" id="tel" class="block input bg-grey montserrat fs-16 fw-600">
                <label for="username" class="block montserrat fs-16 fw-600 mg-t-3">Nama Penguna</label>
                <input type="text" name="username" id="username" class="block input bg-grey montserrat fs-16 fw-600">
                {{-- tambah edit admin --}}
                <label for="idAdmin" class="block montserrat fs-16 fw-600 mg-t-3">ID Admin</label>
                <input type="text" name="idAdmin" id="idAdmin" class="block input bg-grey montserrat fs-16 fw-600">
                {{-- edit user --}}
                <label for="email" class="block montserrat fs-16 fw-600 mg-t-3">Email</label>
                <input type="email" name="email" id="email" class="block input bg-grey montserrat fs-16 fw-600">
                <label for="password" class="block montserrat fs-16 fw-600 mg-t-3">Kata Sandi</label>
                <input type="password" name="password" id="password" class="block input bg-grey montserrat fs-16 fw-600">
                <label for="bank" class="block montserrat fs-16 fw-600 mg-t-3">Bank</label>
                <input type="text" name="bank" id="bank" class="block input bg-grey montserrat fs-16 fw-600">
                <label for="rek" class="block montserrat fs-16 fw-600 mg-t-3">Nomor Rekening</label>
                <input type="text" name="rek" id="rek" class="block input bg-grey montserrat fs-16 fw-600">
                <label for="pemilik" class="block montserrat fs-16 fw-600 mg-t-3">Nama Pemilik</label>
                <input type="text" name="pemilik" id="pemilik" class="block input bg-grey montserrat fs-16 fw-600">
                <label for="alamat" class="block montserrat fs-16 fw-600 mg-t-3">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="block input bg-grey montserrat fs-16 fw-600">
                <label for="provinsi" class="block montserrat fs-16 fw-600 mg-t-3">Provinsi</label>
                <select name="provinsi" id="provinsi" class="block input montserrat wp-97 fs-16 fw-600 mg-t-3">
                    <option value="ba">BA</option>
                </select>
                <label for="kota" class="block montserrat fs-16 fw-600 mg-t-3">Kota/Kabupaten</label>
                <select name="kota" id="kota" class="block input montserrat wp-97 fs-16 fw-600 mg-t-3">
                    <option value="ba">BA</option>
                </select>
                <label for="" class="block montserrat fs-16 fw-600 mg-t-3">Maps</label>
                <div id="maps" class="wp-100 h-300"></div>
                <button type="submit" class="block mg-ha-v-3 btn bg-orange montserrat fs-16 fw-600 pointer">Tambah</button>
                <button type="submit" class="block mg-ha-v-3 btn bg-orange montserrat fs-16 fw-600 pointer">Simpan</button>
            </form>
        </div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDMzbOwUZw-S8v7KzKj-d3-atmdr4nncE&callback=initMap&v=weekly"
    async></script>
    <script src="../js/edit-akun.js"></script>
@endsection