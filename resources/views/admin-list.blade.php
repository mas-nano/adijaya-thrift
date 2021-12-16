@extends('layouts.admin')
@section('content')
@php
    $i = 0;
@endphp
<div class="wrapper">
    <p class="ta-c montserrat fs-36 fw-600">Admin</p>
    <div class="flex jc-r ai-c">
        <a href="admin/tambah" class="btn-tambah bg-orange mg-r-2 td-0 louis fs-20">+ Tambah</a>
        <form action="" method="get" class="w-300">
            <label for="search" class="louis fs-14 mg-r-2">Cari</label>
            <input type="text" name="search" id="search" class="input-search">
        </form>
    </div>
    <input type="hidden" name="" id="_token" value="{{ csrf_token() }}">
    <table class="bg-grey table mg-t-3 louis fs-14">
        <thead class="ta-c">
            <td class="pd-h-2">No</td>
            <td class="pd-h-2">Nama</td>
            <td class="pd-h-2">ID Admin</td>
            <td class="pd-h-2">Username</td>
            <td class="pd-h-2">Email</td>
            <td class="pd-h-2"></td>
        </thead>
        <div id="listAdmin">
            @foreach ($admin as $a)
            <tbody class="bg-white ta-c">
                <td class="pd-h-2">{{ ++$i }}</td>
                <td class="pd-h-2">{{ $a->nama }}</td>
                <td class="pd-h-2">{{ $a->id_admin }}</td>
                <td class="pd-h-2">{{ $a->username }}</td>
                <td class="pd-h-2">{{ $a->email }}</td>
                <td class="pd-h-2"><span class="pointer mg-h-1"><a href="admin/ubah/{{ $a->id }}" class="td-0 black"><i class="fas fa-pen"></i></a></span> <span id="modal" class="pointer mg-h-1" data-id="{{ $a->id }}"><i class="fas fa-trash red"></i></span></td>
            </tbody>
            @endforeach
        </div>
    </table>
    @if (count($admin)<1)
        <p class="louis ta-c">Admin tidak ditemukan</p>
    @endif
</div>
<div class="modal" id="modalBox">
    <div class="modalContent">
        <p class="pointer mg-l-3 fa fa-chevron-left close"></p>
        <p class="montserrat fw-600 fs-30 ta-c">Apa anda yakin ingin menghapus admin ini?</p>
        <div class="flex jc-c">
            <button type="button" id="yakin-admin" class="btn bg-orange pointer mg-h-1">Yakin</button>
            <button type="button" id="tidak" class="btn bg-red pointer mg-h-1">Tidak</button>
        </div>
    </div>
</div>
<script src="{{ asset('js/produk.js') }}"></script>
@endsection