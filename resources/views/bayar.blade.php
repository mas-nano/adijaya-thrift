@extends('layouts.main')
@section('content')
<div class="wrapper-luar">
    <p class="sub">Pembayaran</p>
    <div class="wrapper-dalam">
        <div class="left">
            <div class="total">
                <pre>Total      Rp{{ number_format($data->total, 0, ',', '.') }}</pre>
                <p>Bayar pesanan sesuai dengan jumlah di atas</p>
            </div>
            <div class="total">
                <pre>Transfer Bank</pre>
                <p>Silahkan transfer sesuai dengan jumlah ke rekening berikut:</p>
                <div class="wrapper-bca">
                    <img src="{{ asset('img/bca.png') }}" alt="">
                    <div class="detail-bca">
                        <p>Bank: BCA</p>
                        <p>Nomor Rekening: 1234567890</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="split">
            <input type="hidden" name="" value="{{ session('dataUser')['id'] }}" id="user_id">
        </div>
        <div class="right">
            <form action="" method="POST">
                @csrf
                <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                <input type="hidden" name="stok" value="{{ $produk->stok }}">
                <input type="hidden" name="id" id="id" value="{{ $data->id }}">
                <div class="wrapper-bayar">
                    <label for="bank" class="input">Bank</label>
                    <input type="text" name="nama_bank" id="bank" placeholder="Nama Bank">
                    <label for="rekening" class="input">Nomor Rekening</label>
                    <input type="text" name="nomor_rekening" id="rekening" class="input" placeholder="Nomor Rekening">
                    <label for="pemilik" class="input">Nama Pemilik</label>
                    <input type="text" name="nama" id="pemilik" class="input" placeholder="Nama Pemilik">
                </div>
            </div>
        </div>
    </div>
    <div class="full">
        <div class="wrapper-form">
            @if (isset($error))
            @foreach ($error as $item)
                @foreach ($item as $msg)
                <div class="message warn">
                    <p class="center">{{ $msg }}</p>
                </div>
                
                @endforeach
            @endforeach
            @endif
            <label for="alamat" class="input">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="input" placeholder="Alamat">
            <label for="provinsi" class="input">Provinsi</label>
            <select name="provinsi" id="provinsi" class="input">
                <option value="">Pilih Provinsi</option>
                @for ($i = 0; $i < count($prov); $i++)
                <option value="{{ $prov[$i]['name'] }}" id="{{ $prov[$i]['id'] }}">{{ $prov[$i]['name'] }}</option>
                @endfor
            </select>
            <label for="Kota" class="input">Kota</label>
            <select name="kota" id="kota" class="input">
                <option value="">-</option>
            </select>
        </div>
    </div>
    <div class="flex">
        <button type="submit" name="konfirmasi" class="btn orange">Konfirmasi</button>
        <button type="button" name="batal" class="btn red" id="batal">Batalkan</button>
    </div>
</form>
<input type="hidden" name="" id="_token" value="{{ csrf_token() }}">
<script src="{{ asset('js/bayar.js') }}"></script>
    @endsection