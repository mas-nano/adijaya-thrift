@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <p class="montserrat fs-22 ta-c fw-600">Dana Perusahaan</p>
    <div class="flex jus-con-sa">
        <div class="box bg-grey inline-block pd-5">
            <p class="montserrat fs-22 ta-c mg-v-1">Jumlah Pemesanan</p>
            <p class="montserrat fs-30 fw-600 mg-v-1">3</p>
        </div>
        <div class="box bg-grey inline-block pd-5">
            <p class="montserrat fs-22 ta-c mg-v-1">Jumlah Pengguna</p>
            <p class="montserrat fs-30 fw-600 mg-v-1">2</p>
        </div>
        <div class="box bg-grey inline-block pd-5">
            <p class="montserrat fs-22 ta-c mg-v-1">Jumlah Pemasukan</p>
            <p class="montserrat fs-30 fw-600 mg-v-1">Rp100000</p>
        </div>
    </div>
    <div class="box bg-grey mg-t-3 pd-h-3 pd-v-5">
        <p class="montserrat fs-22 ta-c fw-600 mg-v-1">Pemasukan</p>
        <canvas id="chart"></canvas>
    </div>
    <div class="flex jc-r ai-c mg-t-3">
        <a href="kelolaDana" class="btn-tambah bg-orange td-0 louis fs-20">+ Tambah</a>
    </div>
    <table class="bg-grey table mg-t-3 louis fs-14">
        <thead class="ta-c">
            <td class="pd-h-2">Tgl Pencairan</td>
            <td class="pd-h-2">Nominal</td>
            <td class="pd-h-2">Bank</td>
            <td class="pd-h-2">Rekening</td>
            <td class="pd-h-2">Keterangan</td>
            <td class="pd-h-2"></td>
        </thead>
        <tbody class="bg-white ta-c">
            <td class="pd-h-2">04/01/2010</td>
            <td class="pd-h-2">100.000</td>
            <td class="pd-h-2">BCA</td>
            <td class="pd-h-2">50006543</td>
            <td class="pd-h-2">Pembayaran Gaji</td>
            <td class="pd-h-2"><a href="kelolaDana" class="td-0 black"><i class="fas fa-info-circle"></i></a></td>
        </tbody>
        <tbody class="bg-white ta-c">
            <td class="pd-h-2">04/01/2010</td>
            <td class="pd-h-2">100.000</td>
            <td class="pd-h-2">BCA</td>
            <td class="pd-h-2">50006543</td>
            <td class="pd-h-2">Pembayaran Gaji</td>
            <td class="pd-h-2"><a href="kelolaDana" class="td-0 black"><i class="fas fa-info-circle"></i></a></td>
        </tbody>
    </table>
</div>
<script src="../js/dashboard.js"></script>
@endsection