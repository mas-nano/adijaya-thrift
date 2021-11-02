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
    @if ($data['s']!='selesai')
    <div class="btn-wrapper">
        @if ($data['s']=='proses')
        <button class="btn terima" type="button" id="modal">Paket diterima</button>
        @endif
        @if ($data['s']=='sudah-bayar')
        <button class="btn terima" type="button">Paket dikirim</button>
        @endif
    </div>
    @endif
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
            <button type="submit">Buat Penawaran</button>
        </form>
    </div>
</div>
<script src="js/review.js">
</script>
<script src="js/produk.js"></script>
@endsection