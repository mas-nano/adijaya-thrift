@extends('layouts.main')
@section('content')
<div class="wrapper-luar">
    <p class="sub">Pembayaran</p>
    <div class="wrapper-dalam">
        <div class="left">
            <p class="montserrat fw-6 fs-30">Pindai Kode QR</p>
            <p class="louis fs-20">Silahkan membayar sesuai dengan jumlah ke rekening berikut:</p>
            <img src="{{ asset('img/image 15.png') }}" alt="" class="img block center">
        </div>
        <div class="split">
            <input type="hidden" name="" value="{{ session('dataUser')['id'] }}" id="user_id">
        </div>
        <div class="right">
            <form action="" method="post">
                @csrf
            <div class="box">
                <pre>Total      Rp{{ number_format($data->total+$data->nounik, 0, ',', '.') }}</pre>
                <p>Bayar pesanan sesuai dengan jumlah di atas</p>
            </div>
            <div class="box">
                <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                <input type="hidden" name="stok" value="{{ $produk->stok }}">
                <input type="hidden" name="id" id="id" value="{{ $data->id }}">
                <label for="bank" class="block montserrat fw-6 fs-24">Bank</label>
                <input type="text" name="nama_bank" id="bank" class="input louis fs-20 w-75">
                <label for="rek" class="block montserrat fw-6 fs-24">Nomor Rekening</label>
                <input type="text" name="nomor_rekening" id="rek" class="input louis fs-20 w-75">
                <label for="nama" class="block montserrat fw-6 fs-24">Nama Lengkap Pemilik</label>
                <input type="text" name="nama" id="nama" class="input louis fs-20 w-75">
            </div>

        </div>
    </div>
    <div class="box">
        <div class="w-35 mv-4">
            @if (isset($error))
            @foreach ($error as $item)
                @foreach ($item as $msg)
                <div class="message warn">
                    <p class="center">{{ $msg }}</p>
                </div>
                
                @endforeach
            @endforeach
            @endif
            <label for="tel" class="block montserrat fw-6 fs-24">Nomor Telepon</label>
            <input type="text" name="tel" id="tel" class="input louis fs-20 w-75" placeholder="Nomor Telepon">
            <label for="alamat" class="block montserrat fw-6 fs-24">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="input louis fs-20 w-75" placeholder="Alamat">
            <label for="provinsi" class="block montserrat fw-6 fs-24">Provinsi</label>
            <select name="provinsi" id="provinsi" class="dropdown white louis fs-20 w-92">
                <option value="">Pilih Provinsi</option>
                @for ($i = 0; $i < count($prov); $i++)
                <option value="{{ $prov[$i]['name'] }}" id="{{ $prov[$i]['id'] }}">{{ $prov[$i]['name'] }}</option>
                @endfor
            </select>
            <label for="Kota" class="block montserrat fw-6 fs-24">Kota/Kabupaten</label>
            <select name="kota" id="kota" class="dropdown white louis fs-20 w-92">
                <option value="">-</option>
            </select>
        </div>
    </div>
    <div class="flex">
        <button type="submit" name="konfirmasi" class="btn montserrat fw-6 orange">Konfirmasi</button>
        <button type="button" name="batal" class="btn montserrat fw-6 red" id="batal">Batalkan</button>
    </div>
</form>
<input type="hidden" name="" id="_token" value="{{ csrf_token() }}">
</div>
<script src="{{ asset('js/bayar.js') }}"></script>
@endsection