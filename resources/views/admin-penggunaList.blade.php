@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <p class="ta-c montserrat fs-36 fw-600">Pengguna</p>
    <div class="flex jc-r ai-c">
        <a href="pengguna/tambah" class="btn-tambah bg-orange mg-r-2 td-0 louis fs-20">+ Tambah</a>
        <form action="" method="get" class="w-300">
            <label for="search" class="louis fs-14 mg-r-2">Cari</label>
            <input type="text" name="search" id="search" class="input-search">
        </form>
    </div>
    <input type="hidden" name="" id="_token" value="{{ csrf_token() }}">
    <table class="bg-grey table mg-t-3 louis fs-14">
        <thead class="ta-c">
            <td class="pd-h-2">Nama</td>
            <td class="pd-h-2">Nama Pengguna</td>
            <td class="pd-h-2">Email</td>
            <td class="pd-h-2"></td>
        </thead>
        @foreach ($user as $u)
        <tbody class="bg-white ta-c">
            <td class="pd-h-2">{{ $u->name }}</td>
            <td class="pd-h-2">{{ $u->username }}</td>
            <td class="pd-h-2">{{ $u->email }}</td>
            <td class="pd-h-2"><span class="pointer mg-h-1"><a href="pengguna/ubah/{{ $u->id }}" class="td-0 black"><i class="fas fa-pen"></i></a></span> <span id="modal" class="pointer mg-h-1" data-id="{{ $u->id }}"><i class="fas fa-trash red"></i></span></td>
        </tbody>
        @endforeach
    </table>
    @if (count($user)<1)
        <p class="louis ta-c">Pengguna tidak ditemukan</p>
    @endif
</div>
<div class="modal" id="modalBox">
    <div class="modalContent">
        <p class="pointer mg-l-3 fa fa-chevron-left close"></p>
        <p class="montserrat fw-600 fs-30 ta-c">Apa anda yakin ingin menghapus pengguna ini?</p>
        <div class="flex jc-c">
            <button type="button" id="yakin-user" class="btn bg-orange pointer mg-h-1">Yakin</button>
            <button type="button" id="tidak" class="btn bg-red pointer mg-h-1">Tidak</button>
        </div>
    </div>
</div>
<script src="{{ asset('js/produk.js') }}"></script>
@endsection