@extends('layouts.admin')
@section('content')
    <div class="wrapper">
        <div class="box pd-5">
            <form action="" method="post" class="center wp-50">
                @csrf
                <p class="montserrat fw-600 fs-30">ID pesanan: <span>{{ $pencairan->pemesanan->id }}</span></p>
                <p class="montserrat fw-600 fs-30">Total: <span>Rp{{ number_format($pencairan->pemesanan->pembayaran->total-2500,0,',','.') }}</span></p>
                <p class="montserrat fw-600 fs-30">Bank: <span>{{ $pencairan->pemesanan->pembayaran->nama_bank }}</span></p>
                <p class="montserrat fw-600 fs-30">No. rekening: <span>{{ $pencairan->pemesanan->pembayaran->nomor_rekening }}</span></p>
                <button type="submit" class="btn montserrat fw-600 fs-30 mg-ha-v-3 block bg-orange pointer">Kirim</button>
            </form>
        </div>
    </div>
@endsection