@extends('layouts.main')
@section('content')
<div class="wrapper-luar">
    <p class="sub">Pembayaran</p>
    <div class="wrapper-dalam">
        <div class="left">
            <p class="montserrat fw-6 fs-30">Scan QR Code</p>
            <p class="louis fs-20">Silahkan membayar sesuai dengan jumlah ke rekening berikut:</p>
            <img src="img/image 15.png" alt="" class="img block center">
        </div>
        <div class="split"></div>
        <div class="right">
            <div class="box">
                <pre>Total      Rp100.000.000</pre>
                <p>Bayar pesanan sesuai dengan jumlah di atas</p>
            </div>
            <div class="box">
                <label for="bank" class="block montserrat fw-6 fs-24">Bank</label>
                <input type="text" name="bank" id="bank" class="input louis fs-20 w-75">
                <label for="rek" class="block montserrat fw-6 fs-24">Nomor Rekening</label>
                <input type="text" name="rek" id="rek" class="input louis fs-20 w-75">
                <label for="nama" class="block montserrat fw-6 fs-24">Nama Lengkap Pemilik</label>
                <input type="text" name="nama" id="nama" class="input louis fs-20 w-75">
            </div>

        </div>
    </div>
    <div class="box">
        <div class="w-35 center mv-4">
            <label for="alamat" class="block montserrat fw-6 fs-24">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="input louis fs-20 w-75" placeholder="Alamat">
            <label for="provinsi" class="block montserrat fw-6 fs-24">Provinsi</label>
            <select name="provinsi" id="provinsi" class="input louis fs-20 w-92">
                <option value="Jawa Timur">Jawa Timur</option>
                <option value="Jawa Tengah">Jawa Tengah</option>
                <option value="Jawa Barat">Jawa Barat</option>
            </select>
            <label for="Kota" class="block montserrat fw-6 fs-24">Kota</label>
            <select name="kota" id="kota" class="input louis fs-20 w-92">
                <option value="Surabaya">Surabaya</option>
                <option value="Klaten">Klaten</option>
                <option value="Bandung">Jawa Barat</option>
            </select>
        </div>
    </div>
    <div class="flex">
        <button type="submit" name="konfirmasi" class="btn montserrat fw-6 orange">Konfirmasi</button>
        <button type="button" name="batal" class="btn montserrat fw-6 red">Batalkan</button>
    </div>
</div>
@endsection