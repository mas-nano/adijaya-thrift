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
            <div class="bayar">
                <p class="subalamat">Metode Pembayaran</p>
                <input type="radio" value="transfer" name="bayar" id="transfer">
                <label for="transfer">Transfer Bank</label><br>
                <input type="radio" value="qris" name="bayar" id="qris">
                <label for="qris">QRIS</label><br>
                <input type="radio" value="cod" name="bayar" id="cod">
                <label for="cod">COD</label>
            </div>
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
                        <br>
                        <p class="align-kanan total">TOTAL</p>
                    </div>
                    <div class="template">
                        <p class="align-kanan">Rp100.000.000</p>
                        <p class="align-kanan">Rp20.000</p>
                        <br>
                        <p class="align-kanan total">Rp100.020.000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="btn-bayar" type="button">Bayar Pesanan</button>
</div>
@endsection