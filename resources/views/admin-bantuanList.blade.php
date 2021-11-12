@extends('layouts.admin')
@section('content')
@php
    $filter = ['Selesai', 'Belum Tindakan'];
@endphp
<div class="wrapper">
    <p class="ta-c montserrat fs-36 fw-600">Bantuan</p>
    <div class="flex jc-r ai-c">
        <select name="sort" id="sort" class="louis fs-20 br-18">
            <option value="">Filter</option>
            @foreach ($filter as $item)
            <option value="{{ $item }}" {{ ($item==$req?"selected":"") }}>{{ $item }}</option>
            @endforeach
        </select>
    </div>
    <input type="hidden" name="" id="_token" value="{{ csrf_token() }}">
    <table class="bg-grey table mg-t-3 louis fs-14">
        <thead class="ta-c">
            <td class="pd-h-2">Tgl pengajuan</td>
            <td class="pd-h-2">Tgl dibalas</td>
            <td class="pd-h-2">Nama pengguna</td>
            <td class="pd-h-2">Email</td>
            <td class="pd-h-2">Permasalahan</td>
            <td class="pd-h-2">Status</td>
            <td class="pd-h-2"></td>
        </thead>
        @foreach ($bantuan as $b)    
        <tbody class="bg-white ta-c">
            <td class="pd-h-2">{{ $b->tgl_pengajuan }}</td>
            <td class="pd-h-2">{{ (isset($b->tgl_dibalas)?$b->tgl_dibalas:"-") }}</td>
            <td class="pd-h-2">{{ '@'.$b->user->username }}</td>
            <td class="pd-h-2">{{ $b->user->email }}</td>
            <td class="pd-h-2">{{ Str::words($b->permasalahan, 3, '...') }}</td>
            <td class="pd-h-2"><a href="bantuan/{{ $b->id }}" class="td-0 {{ ($b->status=='Selesai'?"green":"red") }}">{{ $b->status }}</a></td>
            <td class="pd-h-2"><span class="pointer mg-h-1 balas" data-id="{{ $b->id }}">
                @if ($b->status!='Selesai')
                <i class="fas fa-reply"></i>
                @endif
            </span></td>
        </tbody>
        @endforeach
    </table>
    @if (count($bantuan)<1)
        <p class="louis ta-c">Bantuan tidak ditemukan</p>
    @endif
</div>
<script src="http://localhost:8000/js/bantuan.js"></script>
@endsection