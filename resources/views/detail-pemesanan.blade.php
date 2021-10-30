@extends('layouts.main')
@section('content')
<div class="wrapper-luar">
    <p class="sub">Pesanan</p>
    <div class="wrapper-dalam">
        <div class="left">
            <div class="alamat">
                <p class="subalamat">Alamat</p>
                <p class="detail">Laras Wahyu</p>
                <p class="detail">Jl. Wisma Pagesangan</p>
                <p class="detail">Surabaya, Jawa Timur</p>
                <p class="detail">102937192816</p>
            </div>
            <p><i class="fa fa-print" aria-hidden="true"></i></p>
        </div>
        <div class="split"></div>
        <div class="right">
            <div class="detail-pesanan">
                <span class="subpesan">Pesan</span>
                <span class="subtotal">Subtotal</span>
                <div class="produk">
                    <img src="img/sepatu.png" alt="" class="template foto">
                    <p class="template nama-produk">Sepatu Ngganteng</p>
                    <p class="template harga-produk">Rp100.000.000</p>
                </div>
                
                <hr>
                <div class="produk detail-total">
                    <div class="template"></div>
                    <div class="template">
                        <p class="align-kanan">SUBTOTAL</p>
                        <p class="align-kanan">PENGIRIMAN</p>
                        <p class="align-kanan">BIAYA ADMIN</p>
                        <br>
                        <p class="align-kanan total">TOTAL</p>
                    </div>
                    <div class="template">
                        <p class="align-kanan">Rp100.000.000</p>
                        <p class="align-kanan">Rp20.000</p>
                        <p class="align-kanan">Rp2.000</p>
                        <br>
                        <p class="align-kanan total">Rp100.020.000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Kalo selesai hapus semua --}}
    <div class="btn-wrapper">
        {{-- Pembeli menerima barang --}}
        <button class="btn terima" type="button">Paket diterima</button>
        {{-- Dikirim via Penjual --}}
        <button class="btn terima" type="button">Paket dikirim</button>
    </div>
</div>
@endsection