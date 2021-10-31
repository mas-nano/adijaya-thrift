@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <p class="ta-c montserrat fs-36 fw-600">Pencairan dana</p>
    <div class="flex jc-r ai-c">
        <select name="sort" id="sort" class="louis fs-20 br-18">
            <option value="">Filter</option>
            <option value="Sudah Dicairkan">Sudah Dicairkan</option>
            <option value="Belum Dicairkan">Belum Dicairkan</option>
        </select>
    </div>
    <table class="bg-grey table mg-t-3 louis fs-14">
        <thead class="ta-c">
            <td class="pd-h-2">ID pesanan</td>
            <td class="pd-h-2">Tgl pengajuan</td>
            <td class="pd-h-2">Tgl pencairan</td>
            <td class="pd-h-2">Nama pengguna penjual</td>
            <td class="pd-h-2">Bank</td>
            <td class="pd-h-2">Rekening</td>
            <td class="pd-h-2">Status</td>
            <td class="pd-h-2"></td>
        </thead>
        <tbody class="bg-white ta-c">
            <td class="pd-h-2">001</td>
            <td class="pd-h-2">03/10/2021</td>
            <td class="pd-h-2">03/10/2021</td>
            <td class="pd-h-2">@yefichlr</td>
            <td class="pd-h-2">BCA</td>
            <td class="pd-h-2">50006543</td>
            <td class="pd-h-2 green">Sudah Dicairkan</td>
            <td class="pd-h-2"><span class="pointer mg-h-1"><a href="kelolaPencairan" class="td-0 black"><i class="fas fa-exchange-alt"></i></a></span></td>
        </tbody>
        <tbody class="bg-white ta-c">
            <td class="pd-h-2">002</td>
            <td class="pd-h-2">03/10/2021</td>
            <td class="pd-h-2">03/10/2021</td>
            <td class="pd-h-2">@yefichlr</td>
            <td class="pd-h-2">BCA</td>
            <td class="pd-h-2">50006543</td>
            <td class="pd-h-2 red">Belum Dicairkan</td>
            <td class="pd-h-2"><span class="pointer mg-h-1"><a href="kelolaPencairan" class="td-0 black"><i class="fas fa-exchange-alt"></i></a></span></td>
        </tbody>
    </table>
</div>
@endsection