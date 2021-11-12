@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <p class="ta-c montserrat fs-36 fw-600">Produk</p>
    <div class="flex jc-r ai-c">
        <form action="" method="get" class="w-300">
            <label for="search" class="louis fs-14 mg-r-2">Search</label>
            <input type="text" name="search" id="search" class="input-search">
        </form>
    </div>
    <input type="hidden" name="" id="_token" value="{{ csrf_token() }}">
    <table class="bg-grey table mg-t-3 louis fs-14">
        <thead class="ta-c">
            <td class="pd-h-2">ID Produk</td>
            <td class="pd-h-2">Nama Produk</td>
            <td class="pd-h-2">Penjual</td>
            <td class="pd-h-2">Harga</td>
            <td class="pd-h-2"></td>
        </thead>
        @foreach ($produk as $p)
        <tbody class="bg-white ta-c">
            <td class="pd-h-2">{{ $p->id }}</td>
            <td class="pd-h-2">{{ $p->nama_produk }}</td>
            <td class="pd-h-2">{{ $p->user->name }}</td>
            <td class="pd-h-2">Rp{{ number_format($p->harga, 0, ',', '.') }}</td>
            <td class="pd-h-2"><span class="pointer mg-h-1"><a href="produk/ubah/{{ $p->id }}" class="td-0 black"><i class="fas fa-pen"></i></a></span> <span id="modal" class="pointer mg-h-1" data-id="{{ $p->id }}"><i class="fas fa-trash red"></i></span></td>
        </tbody>
        @endforeach
    </table>
    @if (count($produk)<1)
        <p class="louis ta-c">Produk tidak ditemukan</p>
    @endif
</div>
<div class="modal" id="modalBox">
    <div class="modalContent">
        <p class="pointer mg-l-3 fa fa-chevron-left close"></p>
        <p class="montserrat fw-600 fs-30 ta-c">Apa anda yakin ingin menghapus produk ini?</p>
        <div class="flex jc-c">
            <button type="button" id="yakin-produk" class="btn bg-orange pointer mg-h-1">Yakin</button>
            <button type="button" id="tidak" class="btn bg-red pointer mg-h-1">Tidak</button>
        </div>
    </div>
</div>
<script src="../js/produk.js"></script>
@endsection