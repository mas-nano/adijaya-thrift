@extends('layouts.main')
@section('content')
<form action="" method="post">
    @csrf
    <input type="hidden" name="metode_bayar" value="{{ $data['metode_bayar'] }}">
    <input type="hidden" name="total" value="{{ $data['total'] }}">
    <input type="hidden" name="aksi" value="true">
    <input type="hidden" name="nounik" value="{{ $data['nounik'] }}">
    <div class="wrapper">
        <p class="montserrat fw-6 fs-36">Panduan</p>
        <div class="box">
            <p class="montserrat fw-6 fs-24">1. Sebelum membayar, pastikan anda meminta konfirmasi terlebih dahulu ke penjual mengenai produk yang dibeli dengan menghubungi langsung ke penjual. <br>
                <br>
                2. Pihak pemilik aplikasi tidak akan bertanggung jawab apabila produk yang dibeli oleh pembeli tidak sesuai. <br>
                <br>
                3. Pembayaran dengan sistem Bayar di tempat dilakukan secara langsung antara pihak pembeli dan penjual.</p>
        </div>
        <div class="flex mt-3">
            <button type="button" class="btn red montserrat fw-6 fs-24"><a href="/produk/{{ $produk['id'] }}" class="td-0 white">Saya tidak menyetujui</a></button>
            <button type="submit" class="btn orange montserrat fw-6 fs-24">Saya menyetujui</button>
        </div>
    </div>
</form>
@endsection