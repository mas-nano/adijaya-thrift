@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <p class="ta-c montserrat fs-36 fw-600">Konfirmasi Pembayaran</p>
    <div class="flex jc-r ai-c">
        <select name="sort" id="sort" class="louis fs-20 br-18">
            <option value="">Filter</option>
            <option value="Sudah Dikonfirmasi">Sudah Dikonfirmasi</option>
            <option value="Belum Dikonfirmasi">Belum Dikonfirmasi</option>
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
        <tbody class="bg-white ta-c">
            <td class="pd-h-2">001</td>
            <td class="pd-h-2">@yefichlr</td>
            <td class="pd-h-2">BCA</td>
            <td class="pd-h-2">50006543</td>
            <td class="pd-h-2 green">Sudah Dikonfirmasi</td>
            <td class="pd-h-2"><span class="pointer mg-h-1"><a href="kelolaKonfirmasi" class="td-0 black"><i class="fas fa-check-circle green"></i></a></span></td>
        </tbody>
        <tbody class="bg-white ta-c">
            <td class="pd-h-2">002</td>
            <td class="pd-h-2">@yefichlr</td>
            <td class="pd-h-2">BCA</td>
            <td class="pd-h-2">50006543</td>
            <td class="pd-h-2 red">Belum Dikonfirmasi</td>
            <td class="pd-h-2"><span class="pointer mg-h-1"><a href="kelolaKonfirmasi" class="td-0 black"><i class="far fa-check-circle"></i></a></span></td>
        </tbody>
    </table>
</div>
@endsection