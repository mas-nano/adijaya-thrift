@extends('layouts.main')
@section('content')
<div class="wrapper-luar">
    <form action="" method="post">
        @csrf
    <p class="sub">Pesanan</p>
    <div class="wrapper-dalam">
        <div class="left">
            <div class="alamat">
                <p class="subalamat">Metode Pengiriman</p>
                <input type="radio" value="transfer" name="kurir" id="kurir" checked>
                <label for="kurir">Standar</label><br>
            </div>
            <div class="bayar">
                <p class="subalamat">Metode Pembayaran</p>
                <input type="radio" value="transfer" name="metode_bayar" id="transfer" checked>
                <label for="transfer">Transfer Bank</label><br>
                <input type="radio" value="qris" name="metode_bayar" id="qris">
                <label for="qris">QRIS</label><br>
                <input type="radio" value="cod" name="metode_bayar" id="cod">
                <label for="cod">COD</label>
            </div>
        </div>
        <div class="split"></div>
        <div class="right">
            <div class="detail-pesanan">
                <span class="subpesan">Pesan</span>
                <span class="subtotal">Subtotal</span>
                <div class="produk">
                    <img src="../img/uploads/produk/{{ (isset($produk['foto'])?$produk['foto']:"") }}" alt="" class="template foto">
                    <p class="template nama-produk">{{ (isset($produk['nama_produk'])?$produk['nama_produk']:"") }}</p>
                    @if (isset($produk['promo']))
                    <p class="template harga-produk">Rp{{ (isset($produk['promo'])?number_format($produk['promo'], 0, ',', '.'):"") }}</p>
                    @else
                    <p class="template harga-produk">Rp{{ (isset($produk['harga'])?number_format($produk['harga'], 0, ',', '.'):"") }}</p>
                    @endif
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
                        @if (isset($produk['promo']))
                        <p class="align-kanan">Rp{{ (isset($produk['promo'])?number_format($produk['promo'], 0, ',', '.'):"") }}</p>
                        @else
                        <p class="align-kanan">Rp{{ (isset($produk['harga'])?number_format($produk['harga'], 0, ',', '.'):"") }}</p>
                        @endif
                        <p class="align-kanan">Rp20.000</p>
                        <p class="align-kanan">Rp2.000</p>
                        <br>
                        @if (isset($produk['promo']))
                        <p class="align-kanan total">Rp{{ (isset($produk['promo'])?number_format($produk['promo']+22000, 0, ',', '.'):"") }}</p>
                        @else
                        <p class="align-kanan total">Rp{{ (isset($produk['harga'])?number_format($produk['harga']+22000, 0, ',', '.'):"") }}</p>
                        @endif
                    </div>
                </div>
                @if (isset($produk['promo']))
                <input type="hidden" name="total" value="{{ (isset($produk['promo'])?$produk['promo']+22000:"") }}">
                @else
                <input type="hidden" name="total" value="{{ (isset($produk['harga'])?$produk['harga']+22000:"") }}">
                @endif
            </div>
        </div>
    </div>
    <button class="btn-bayar" type="submit">Bayar Pesanan</button>
</form>
</div>
@endsection