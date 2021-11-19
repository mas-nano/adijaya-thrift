@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <p class="ta-c montserrat fs-36 fw-600">Konfirmasi Pembayaran</p>
    <div class="flex jc-r ai-c">
        <select name="sort" id="sort" class="louis fs-20 br-18">
            <option value="">Filter</option>
            <option value="Sudah Dikonfirmasi" {{ ($req=='Sudah Dikonfirmasi'?"selected":"") }}>Sudah Dikonfirmasi</option>
            <option value="Belum Dikonfirmasi" {{ ($req=='Belum Dikonfirmasi'?"selected":"") }}>Belum Dikonfirmasi</option>
        </select>
    </div>
    <table class="bg-grey table mg-t-3 louis fs-14">
        <thead class="ta-c">
            <td class="pd-h-2">ID pesanan</td>
            <td class="pd-h-2">Nama penjual</td>
            <td class="pd-h-2">Bank</td>
            <td class="pd-h-2">Rekening</td>
            <td class="pd-h-2">Status</td>
            <td class="pd-h-2"></td>
        </thead>
        @foreach ($konfirmasi as $k)    
        <tbody class="bg-white ta-c">
            <td class="pd-h-2">{{ $k->id }}</td>
            <td class="pd-h-2">{{ "@".$k->pembeli->username }}</td>
            <td class="pd-h-2">{{ $k->pembayaran->nama_bank }}</td>
            <td class="pd-h-2">{{ $k->pembayaran->nomor_rekening }}</td>
            <td class="pd-h-2 {{ ($k->status_admin=='Sudah Dikonfirmasi'?"green":"red") }}">{{ $k->status_admin }}</td>
            <td class="pd-h-2"><span class="mg-h-1"><a {!! ($k->status_admin=='Sudah Dikonfirmasi'?"":"href='konfirmasi/".$k->id."'") !!} class="td-0 black"><i class="{{ ($k->status_admin=='Sudah Dikonfirmasi'?"fas":"far") }} fa-check-circle {{ ($k->status_admin=='Sudah Dikonfirmasi'?"green":"") }}"></i></a></span></td>
        </tbody>
        @endforeach
    </table>
    @if (count($konfirmasi)<1)
    <p class="louis ta-c">Konfirmasi pembayaran tidak ditemukan</p>
    @endif
</div>
<script>
    $("#sort").change(function(){
        window.location.href = `/admin/konfirmasi?search=${$("#sort").val()}`;
    })
</script>
@endsection