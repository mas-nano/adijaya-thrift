@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <p class="montserrat fs-22 ta-c fw-600">Beranda</p>
    <div class="flex jus-con-sa">
        <div class="box bg-grey inline-block pd-5">
            <p class="montserrat fs-22 ta-c mg-v-1">Jumlah Pemesanan</p>
            <p class="montserrat fs-30 fw-600 mg-v-1">{{ $pemesanan }}</p>
        </div>
        <div class="box bg-grey inline-block pd-5">
            <p class="montserrat fs-22 ta-c mg-v-1">Jumlah Pengguna</p>
            <p class="montserrat fs-30 fw-600 mg-v-1">{{ $user }}</p>
        </div>
        <div class="box bg-grey inline-block pd-5">
            <p class="montserrat fs-22 ta-c mg-v-1">Jumlah Pemasukan</p>
            <p class="montserrat fs-30 fw-600 mg-v-1">Rp{{ number_format($pemasukan,0,',','.') }}</p>
        </div>
    </div>
    <div class="box bg-grey mg-t-3 pd-h-3 pd-v-5">
        <p class="montserrat fs-22 ta-c fw-600 mg-v-1">Pemasukan</p>
        <div class="chart-cont">
            <canvas id="chart"></canvas>
        </div>
    </div>
</div>
<script>
    var data = [
        @for($i=0; $i<count($bulan); $i++)
        {{ $bulan[$i] }}{{ ($i==count($bulan)-1?"":",") }}
        @endfor
    ]
</script>
<script src="../js/dashboard.js"></script>
@endsection