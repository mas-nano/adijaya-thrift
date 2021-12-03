@extends('layouts.admin')
@section('content')

    <div class="wrapper">
        <p class="montserrat fw-500 fs-24 ta-c">ID Pesanan: <span>{{ $pemesanan->id }}</span></p>
        <div class="flex">
            <div class="flex-5">
                <div class="box pd-5 mg-b-4">
                    <p class="montserrat fw-600 fs-30">Alamat</p>
                    <p class="louis-b fs-20 mg-0">{{ $pemesanan->pembeli->name }}</p>
                    <p class="louis-b fs-20 mg-0">{{ $pemesanan->pembayaran->alamat }}, {{ $pemesanan->pembayaran->kota }}, {{ $pemesanan->pembayaran->provinsi }}</p>
                    <p class="louis-b fs-20 mg-0">{{ $pemesanan->pembayaran->tel }}</p>
                </div>
                <div class="box pd-5 mg-b-4">
                    <p class="montserrat fw-600 fs-30">Rekening</p>
                    <p class="louis-b fs-20 mg-0">{{ $pemesanan->pembayaran->nama }}</p>
                    <p class="louis-b fs-20 mg-0">{{ $pemesanan->pembayaran->nama_bank }}</p>
                    <p class="louis-b fs-20 mg-0">{{ $pemesanan->pembayaran->nomor_rekening }}</p>
                </div>
            </div>
            <div class="flex-1"></div>
            <div class="flex-8">
                <div class="box mg-b-3">
                    <div class="wp-90 center pd-h-5">
                        <span class="montserrat fw-600 fs-30 inline-block wcalc-custom">Produk</span>
                        <span class="montserrat fw-500 fs-24 inline-block ta-r wcalc-custom">Subtotal</span>
                        <div class="flex mg-v-2 louis fs-20">
                            <img src="{{ asset('img/uploads/produk/'.$pemesanan->produk->foto) }}" alt="" class="img-produk flex-1">
                            <p class="flex-1 mg-l-3">{{ $pemesanan->produk->nama_produk }}</p>
                            <p class="flex-1 ta-r">Rp{{ number_format($pemesanan->pembayaran->total-22500, 0, ',', '.') }}</p>
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
                                <p class="mg-0">Rp{{ number_format($pemesanan->pembayaran->total-22500, 0, ',', '.') }}</p>
                                <p class="mg-0">Rp20.000</p>
                                <p class="mg-0">Rp2.500</p>
                                <p class="montserrat fw-600 fs-24">Rp{{ number_format($pemesanan->pembayaran->total, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="" method="post">
                    @csrf
                    <button type="submit" class="btn block mg-ha-v-3 bg-orange montserrat fw-600 fs-24 pointer">Konfirmasi</button>
                </form>
            </div>
        </div>
    </div>
@endsection