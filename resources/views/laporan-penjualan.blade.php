@extends('layouts.main')
@section('content')
<div class="wrapper">
    <div class="left">
        <div class="profil">
            <div>
                <img src="{{ asset('img/uploads/profile_images/'.session('dataUser')['gambar']) }}" alt="">
            </div>
            <div>
                <p class="nama-toko">{{ session('dataUser')['nama'] }}</p>
                <p class="nama-pengguna">{{ '@'.session('dataUser')['username'] }}</p>
                @for ($j = 1; $j <= 5; $j++)
                    <i class="{{ ($j<=$rating?"fas":"far") }} fa-star checked"></i>
                @endfor
            </div>
        </div>
        <div class="pilihan">
            <div>
                <a href="/produk-toko" class="atas">Produk</a>
                <a href="/chat" class="">Pesan</a>
                <a href="/penawaran" class="">Penawaran</a>
                <a href="/pesanan-masuk" class="">Penjualan</a>
                <a href="" class="terpilih">Laporan Penjualan</a>
                <a href="/riwayat-penjualan" class="">Riwayat Penjualan</a>
                <a href="/bantuan" class="bawah">Bantuan</a>
            </div>
        </div>
    </div>
    <div class="split"></div>
    <div class="right">
        <div class="box">
            <div class="width-90 pt-10">
                <p class="sub">Total penjualan hari ini</p>
                <p class="harga">Rp{{ number_format($total, 0, ',', '.') }}</p>
            </div>
        </div>
        <div class="box">
            <p class="center">Laporan Mingguan</p>
            <canvas id="chart"></canvas>
        </div>
    </div>
</div>
<script>
    var labels = [
        @for($i=count($tanggal)-1; $i>=0; $i--)
        '{{ $tanggal[$i] }}'{{ ($i==0?"":",") }}
        @endfor
    ];
    var data = [
        @for($i=count($jumlah)-1; $i>=0; $i--)
        {{ $jumlah[$i] }}{{ ($i==0?"":",") }}
        @endfor
    ]
</script>
<script src="{{ asset('js/laporan-penjualan.js') }}"></script>
@endsection