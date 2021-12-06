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
            @if (session('dataUser')['id']==$data->penjual_id)    
                @if ($data->status_terima=="Selesai")
                    <p><i class="fa fa-print" aria-hidden="true"></i></p>
                @endif
            @endif
        </div>
        <div class="split"></div>
        <div class="right">
            <div class="detail-pesanan">
                <span class="subpesan">Pesan</span>
                <span class="subtotal">Subtotal</span>
                <div class="produk">
                    <img src="{{ app('firebase.storage')->getBucket()->object("img/produk/".$data->produk->foto)->signedUrl(new \DateTime('tomorrow')) }}" alt="" class="template foto">
                    <p class="template nama-produk">{{ $data->produk->nama_produk }}</p>
                    <p class="template harga-produk">Rp{{ number_format($data->pembayaran->total-22500, 0, ',', '.') }}</p>
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
                        <p class="align-kanan">Rp{{ number_format($data->pembayaran->total-22500, 0, ',', '.') }}</p>
                        <p class="align-kanan">Rp{{ $data->pembayaran->metode_pembayaran=="cod"?0: number_format(20000, 0, ',', '.')}}</p>
                        <p class="align-kanan">Rp{{ $data->pembayaran->metode_pembayaran=="cod"?0: number_format(2500, 0, ',', '.')}}</p>
                        <br>
                        <p class="align-kanan total">Rp{{ $data->pembayaran->metode_pembayaran=="cod"?number_format($data->pembayaran->total-22500, 0, ',', '.'):number_format($data->pembayaran->total, 0, ',', '.') }}</p>
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
            @if ($data->status_kirim=="Belum dikirim")
            <form action="" method="post">
                @csrf
                <button class="btn terima" type="submit" name="kirim">Paket dikirim</button>
            </form>
            @endif
        @endif
        @if ($data->status_pembeli=="Menunggu Pembayaran"&&$data->user_id==session('dataUser')['id'])
        <button class="btn terima" type="button"><a href="/pembayaran/{{ $data->pembayaran_id }}" class="link-bayar">Bayar Sekarang</a></button>
        @endif
    </div>
</div>
<div class="modal" id="modalBox" {!! (isset($error)?"style='display: block;'":"") !!}>
    <div class="modalContent">
        <p class="close"><i class="fas fa-chevron-left"></i></p>
        <div class="star">
            <i class="far fa-star fa-2x checked" id="1"></i>
            <i class="far fa-star fa-2x checked" id="2"></i>
            <i class="far fa-star fa-2x checked" id="3"></i>
            <i class="far fa-star fa-2x checked" id="4"></i>
            <i class="far fa-star fa-2x checked" id="5"></i>
        </div>
        <form action="" method="POST">
            @csrf
            <input type="hidden" name="rating" id="rating">
            <p class="sub-modal">Review</p>
            <textarea name="review" id="" rows="5"></textarea>
            <button type="submit" name="terima">Kirim</button>
        </form>
        @if (isset($error))
            @foreach ($error as $item)
                @foreach ($item as $msg)
                <p class="center">{{ $msg }}</p>
                @endforeach
            @endforeach
        @endif
    </div>
</div>
<div id="print">
    <div class="ticket">
        <p class="centered">Nota Pembelian</p>
            <p class="centered m-0">ID: 1</p>
            <img src="{{ asset('img/phooo 1.png') }}" alt="" class="mh">
            <p class="m-0">Tanggal Pembelian : {{ $data->created_at->format('d-m-Y') }}</p>
            <p>Tanggal Cetak : {{ date('d-m-Y') }}</p>
        <table>
            <thead>
                <tr>
                    <th class="quantity">Q.</th>
                    <th class="description">Deskripsi</th>
                    <th class="price">Harga</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="quantity">1</td>
                    <td class="description">{{ $data->produk->nama_produk }}</td>
                    <td class="price">Rp{{ number_format($data->pembayaran->total, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="quantity"></td>
                    <td class="description">TOTAL</td>
                    <td class="price">Rp{{ number_format($data->pembayaran->total, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
        <p class="centered">Terima kasih telah berbelanja di
            <br>Adijaya Thrift</p>
    </div>
</div>
<script src="{{ asset('/js/review.js') }}">
</script>
<script src="{{ asset('/js/produk.js') }}"></script>
@endsection