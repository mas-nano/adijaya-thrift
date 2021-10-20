@extends('layouts.main')
@section('content')
<div class="wrapper-luar">
    <p class="sub">Pembayaran</p>
    <div class="wrapper-dalam">
        <div class="left">
            <div class="total">
                <pre>Total      Rp100.000.000</pre>
                <p>Bayar pesanan sesuai dengan jumlah di atas</p>
            </div>
            <div class="total">
                <pre>Transfer Bank</pre>
                <p>Silahkan transfer sesuai dengan jumlah ke rekening berikut:</p>
                <div class="wrapper-bca">
                    <img src="img/bca.png" alt="">
                    <div class="detail-bca">
                        <p>Bank: BCA</p>
                        <p>Nomor Rekening: 1234567890</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="split"></div>
        <div class="right">
            <form action="" method="POST">
                <div class="wrapper-bayar">
                    <label for="bank" class="input">Bank</label>
                    <select name="bank" id="bank" class="input">
                        <option value="bca">BCA</option>
                        <option value="mandiri">Mandiri</option>
                        <option value="bri">BRI</option>
                    </select>
                    <label for="rekening" class="input">Nomor Rekening</label>
                    <input type="text" name="rekening" id="rekening" class="input" placeholder="Nomor Rekening">
                    <label for="pemilik" class="input">Nama Pemilik</label>
                    <input type="text" name="pemilik" id="pemilik" class="input" placeholder="Nama Pemilik">
                </div>
            </div>
        </div>
    </div>
    <div class="full">
        <div class="wrapper-form">
            <label for="alamat" class="input">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="input" placeholder="Alamat">
            <label for="provinsi" class="input">Provinsi</label>
            <select name="provinsi" id="provinsi" class="input">
                <option value="Jawa Timur">Jawa Timur</option>
                <option value="Jawa Tengah">Jawa Tengah</option>
                <option value="Jawa Barat">Jawa Barat</option>
            </select>
            <label for="Kota" class="input">Kota</label>
            <select name="kota" id="kota" class="input">
                <option value="Surabaya">Surabaya</option>
                <option value="Klaten">Klaten</option>
                <option value="Bandung">Jawa Barat</option>
            </select>
        </div>
    </div>
    <button type="submit" name="konfirmasi">Konfirmasi</button>
</form>
    @endsection