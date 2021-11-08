@extends('layouts.main')
@section('content')
<div class="wrapper-luar">
    <p class="sub">Pesanan</p>
    <div class="wrapper-dalam">
        <div class="left">
            <div class="alamat">
                <p class="subalamat">Alamat</p>
                @if (!is_null($data->pembayaran->alamat))    
                <p class="detail">{{ $data->pembeli->name }}</p>
                <p class="detail">{{ $data->pembayaran->alamat }}</p>
                <p class="detail">{{ $data->pembayaran->kota }}, {{ $data->pembayaran->provinsi }}</p>
                <p class="detail">{{ (is_null($data->pembeli->tel)?"Nomor telepon Anda tidak tersedia":$data->pembeli->tel) }}</p>
                @endif
            </div>
            <p><i class="fa fa-print" aria-hidden="true"></i></p>
        </div>
        <div class="split"></div>
        <div class="right">
            <div class="detail-pesanan">
                <span class="subpesan">Pesan</span>
                <span class="subtotal">Subtotal</span>
                <div class="produk">
                    <img src="../img/uploads/produk/{{ $data->produk->foto }}" alt="" class="template foto">
                    <p class="template nama-produk">{{ $data->produk->nama_produk }}</p>
                    <p class="template harga-produk">Rp{{ (is_null($data->produk->promo)?number_format($data->produk->harga, 0, ',', '.'):number_format($data->produk->promo, 0, ',', '.')) }}</p>
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
                        <p class="align-kanan">Rp{{ (is_null($data->produk->promo)?number_format($data->produk->harga, 0, ',', '.'):number_format($data->produk->promo, 0, ',', '.')) }}</p>
                        <p class="align-kanan">Rp20.000</p>
                        <p class="align-kanan">Rp2.000</p>
                        <br>
                        <p class="align-kanan total">Rp{{ (is_null($data->produk->promo)?number_format($data->produk->harga+22000, 0, ',', '.'):number_format($data->produk->promo+22000, 0, ',', '.')) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-wrapper">
        @if ($data->status_pembeli=="Proses")
        <button class="btn terima" type="button" id="modal">Paket diterima</button>
        @endif
        @if ($data->status_penjual=="Sudah dibayar")
        <button class="btn terima" type="button">Paket dikirim</button>
        @endif
        @if ($data->status_pembeli=="Menunggu Pembayaran")
        <button class="btn terima" type="button"><a href="/pembayaran/{{ $data->pembayaran_id }}" class="link-bayar">Bayar Sekarang</a></button>
        @endif
    </div>
</div>
<div class="modal" id="modalBox">
    <div class="modalContent">
        <p class="close fa fa-chevron-left"></p>
        <div class="star">
            <span class="fa fa-star fa-2x" id="1"></span>
            <span class="fa fa-star fa-2x" id="2"></span>
            <span class="fa fa-star fa-2x" id="3"></span>
            <span class="fa fa-star fa-2x" id="4"></span>
            <span class="fa fa-star fa-2x" id="5"></span>
        </div>
        <form action="" method="POST">
            <p class="sub-modal">Review</p>
            <textarea name="tawar" id="" rows="5" cols="25"></textarea>
            <button type="submit">Kirim</button>
        </form>
    </div>
</div>
<script src="../js/review.js">
</script>
<script src="../js/produk.js"></script>
@endsection