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
                            <img src="{{ app('firebase.storage')->getBucket()->object("img/produk/".$pemesanan->produk->foto)->signedUrl(new \DateTime('tomorrow')) }}" alt="" class="img-produk flex-1">
                            <<div class="flex-1 mg-l-3">
                                <p>{{ $pemesanan->produk->nama_produk }}</p>
                                <p class="flex ai-c"><img src="{{ asset('img/shop.png') }}" width="18"><a href="/toko/{{ $pemesanan->penjual->id }}" class="td-0 black">{{ ' @'.$pemesanan->penjual->username }}</a></p>
                            </div>
                            <p class="flex-1 ta-r">Rp{{ number_format($pemesanan->pembayaran->total-($pemesanan->produk->berat*10000+2500), 0, ',', '.') }}</p>
                        </div>
                        <hr>
                        <div class="flex">
                            <div class="flex-5 ta-r louis fs-20">
                                <p class="mg-0">SUBTOTAL</p>
                                <p class="mg-0">PENGIRIMAN</p>
                                <p class="mg-0">BIAYA ADMIN</p>
                                <p class="mg-0">KODE UNIK</p>
                                <p class="montserrat fw-600 fs-24">TOTAL</p>
                            </div>
                            <div class="flex-3 ta-r louis fs-20">
                                <p class="mg-0">Rp{{ number_format($pemesanan->pembayaran->total-($pemesanan->produk->berat*10000+2500), 0, ',', '.') }}</p>
                                <p class="mg-0">Rp{{ number_format($pemesanan->produk->berat*10000, 0, ',', '.') }}</p>
                                <p class="mg-0">Rp2.500</p>
                                <p class="mg-0">{{ $pemesanan->pembayaran->nounik }}</p>
                                <p class="montserrat fw-600 fs-24">Rp{{ number_format($pemesanan->pembayaran->total+$pemesanan->pembayaran->nounik, 0, ',', '.') }}</p>
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