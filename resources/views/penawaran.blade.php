@extends('layouts.main')
@section('content')
<div class="wrapper">
    <div class="left">
        <div class="profil">
            <div>
                <img src="img/uploads/profile_images/{{ (session('dataUser')['gambar']?session('dataUser')['gambar']:"phooo 1.png") }}" alt="">
            </div>
            <div>
                <p class="nama-toko">{{ session('dataUser')['nama'] }}</p>
                <p class="nama-pengguna">{{ '@'.session('dataUser')['username'] }}</p>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span>(3)</span>
            </div>
        </div>
        <div class="pilihan">
            <div>
                <a href="/produk-toko" class="atas">Produk</a>
                <a href="/chat" class="">Pesan</a>
                <a href="" class="terpilih">Penawaran</a>
                <a href="/pesanan-masuk" class="">Penjualan</a>
                <a href="/laporan-penjualan" class="">Laporan Penjualan</a>
                <a href="/riwayat-penjualan" class="">Riwayat Penjualan</a>
                <a href="/bantuan" class="bawah">Bantuan</a>
            </div>
        </div>
    </div>
    <div class="split">
        <input type="hidden" name="" id="penjual_id" value="{{ session('dataUser')['id'] }}">
    </div>
    <div class="right">
        <div class="box-radius-18">
            <div class="width-90" id="tawar">
                @if (count($tawar)<1)
                    <p class="warn">Tidak ada penawaran</p>
                @endif
                @foreach ($tawar as $t)
                <div class="status-produk">
                    <img src="img/uploads/produk/{{ $t->produk->foto }}" alt="">
                    <div class="flex-5 mg-l-3">
                        <p class="louis-16">{{ $t->user->name }} menawar</p>
                        <p class="louis-16">{{ $t->produk->nama_produk }}</p>
                    </div>
                    <div class="flex-5 align-r">
                        <p class="louis-16">Rp{{ number_format($t->nominal, 0, ',', '.') }}</p>
                        @if ($t->status=='Proses')    
                            <form action="" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $t->id }}">
                                <button class="btn bg-orange" type="submit" name="terima">Terima</button>
                                <button class="btn bg-red" type="submit" name="tolak">Tolak</button>
                            </form>
                        @endif
                    </div>
                </div>
                @if (++$i!=count($pemesanan))
                    <hr class='grey'>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<script src="js/penawaran.js"></script>
@endsection