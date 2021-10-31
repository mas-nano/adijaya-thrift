@extends('layouts.admin')
@section('content')
    <div class="wrapper">
        <p class="montserrat fw-500 fs-24 ta-c">ID Pesanan: <span>00001</span></p>
        <div class="flex">
            <div class="flex-5">
                <div class="box pd-5 mg-b-4">
                    <p class="montserrat fw-600 fs-30">Alamat</p>
                    <p class="louis-b fs-20 mg-0">Laras Wahyu</p>
                    <p class="louis-b fs-20 mg-0">Jl. Wisma Pagesangan 60244, Surabaya, Jawa Timur</p>
                    <p class="louis-b fs-20 mg-0">0843637574363</p>
                </div>
                <div class="box pd-5 mg-b-4">
                    <p class="montserrat fw-600 fs-30">Rekening</p>
                    <p class="louis-b fs-20 mg-0">Laras Wahyu</p>
                    <p class="louis-b fs-20 mg-0">Bank BCA</p>
                    <p class="louis-b fs-20 mg-0">000785434</p>
                </div>
            </div>
            <div class="flex-1"></div>
            <div class="flex-8">
                <div class="box mg-b-3">
                    <div class="wp-90 center pd-h-5">
                        <span class="montserrat fw-600 fs-30 inline-block wcalc-custom">Produk</span>
                        <span class="montserrat fw-500 fs-24 inline-block ta-r wcalc-custom">Subtotal</span>
                        <div class="flex mg-v-2 louis fs-20">
                            <img src="../img/sepatu.png" alt="" class="img-produk flex-1">
                            <p class="flex-1 mg-l-3">Sepatu Nike Kondisi 90%</p>
                            <p class="flex-1 ta-r">Rp500.000</p>
                        </div>
                        <hr>
                        <div class="flex">
                            <div class="flex-5 ta-r louis fs-20">
                                <p class="mg-0">SUBTOTAL</p>
                                <p class="mg-0">PENGIRIMAN</p>
                                <p class="mg-0">BIAYA ADMIN</p>
                                <p class="montserrat fw-600 fs-24">TOTAL</p>
                            </div>
                            <div class="flex-3 ta-r louis fs-20">
                                <p class="mg-0">Rp500.000</p>
                                <p class="mg-0">Rp20.000</p>
                                <p class="mg-0">Rp2.000</p>
                                <p class="montserrat fw-600 fs-24">Rp522.000</p>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn block mg-ha-v-3 bg-orange montserrat fw-600 fs-24 pointer">Konfirmasi</button>
            </div>
        </div>
    </div>
@endsection