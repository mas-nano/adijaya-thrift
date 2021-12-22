@extends('layouts.main')
@section('content')
    <div class="wrapper">
        <div class="left">
            <div class="profil">
                <div>
                    
                    <img src="{{ app('firebase.storage')->getBucket()->object("img/profil/".session('dataUser')['gambar'])->signedUrl(new \DateTime('tomorrow')) }}" alt="">
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
                    <a href="/akun" class="atas">Edit Profil</a>
                    <a href="/riwayat" class="">Riwayat</a>
                    <a href="/penjualan" class="">Penjualan</a>
                    <a href="" class="terpilih">Disukai</a>
                    <a href="/chat" class="bawah">Pesan</a>
                    <a href="/toko/{{ session('dataUser')['id'] }}">Profil</a>
                    <a class="link" href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Keluar</a>
                </div>
            </div>
        </div>
        <div class="split"></div>
        <div class="right">
            @if (count($wishlist)<1)
                <p class="warn">Tidak ada produk yang disukai</p>
            @endif
            <div class="hasil">
                @foreach ($wishlist as $w)
                @if ($w->produk->stok>0)
                    <div class="produk" id="link" data-id="{{ $w->produk->id }}">
                        <img src="{{ app('firebase.storage')->getBucket()->object("img/produk/".$w->produk->foto)->signedUrl(new \DateTime('tomorrow')) }}" alt="" srcset="" class="gambar-produk">
                        <p class="harga-barang">{{ $w->produk->nama_produk }}</p>
                        @if (!is_null($w->produk->promo))
                            <p class="harga-barang fs-18">Rp<strike>{{ number_format($w->produk->harga, 0, ',', '.') }}</strike></p>
                            <p class="harga-barang fs-20 orange">Rp{{ number_format($w->produk->promo, 0, ',', '.') }}</p>
                            @else
                            <p class="harga-barang fs-18">Rp{{ number_format($w->produk->harga, 0, ',', '.') }}</p>
                            @endif
                    </div>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
    <script>
        $("#link").click(function(){
            window.location.href = `/produk/${$('#link').data('id')}`
        })
    </script>
@endsection