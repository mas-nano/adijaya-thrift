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
                <p class="detail">{{ (is_null($data->pembeli->tel)?"Nomor telepon tidak tersedia":$data->pembeli->tel) }}</p>
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
                    <p class="template harga-produk">Rp{{ number_format($data->pembayaran->total, 0, ',', '.') }}</p>
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
                        <p class="align-kanan">Rp{{ number_format($data->pembayaran->total, 0, ',', '.') }}</p>
                        <p class="align-kanan">Rp20.000</p>
                        <p class="align-kanan">Rp2.000</p>
                        <br>
                        <p class="align-kanan total">Rp{{ number_format($data->pembayaran->total, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-wrapper">
        @if (session('dataUser')['id']==$data->user_id)
            @if ($data->status_pembeli=="Proses")
            <button class="btn terima" type="button" id="modal">Paket diterima</button>
            @endif
        @endif
        @if (session('dataUser')['id']==$data->penjual_id)    
            @if ($data->status_penjual=="Belum dikirim")
            <form action="" method="post">
                @csrf
                <button class="btn terima" type="submit" name="kirim">Paket dikirim</button>
            </form>
            @endif
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
            @csrf
            <p class="sub-modal">Review</p>
            <textarea name="review" id="" rows="5" cols="25"></textarea>
            <button type="submit" name="terima">Kirim</button>
        </form>
    </div>
</div>
<script src="../js/review.js">
</script>
<script src="../js/produk.js"></script>
@endsection