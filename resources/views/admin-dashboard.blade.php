@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <p class="montserrat fs-22 ta-c fw-600">Beranda</p>
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
</div>
<script src="../js/dashboard.js"></script>
@endsection