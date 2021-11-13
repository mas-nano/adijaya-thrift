@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <p class="montserrat fs-22 ta-c fw-600">Dana Perusahaan</p>
    <p class="ta-r"><i class="fas fa-print"></i></p>
    <div class="flex">
        <div class="box bg-grey pd-h-3 pd-v-5 flex-5">
            <p class="montserrat fs-22 ta-c fw-600 mg-v-1">Pemasukan</p>
            <div class="chart-cont">
                <canvas id="chart"></canvas>
            </div>
        </div>
        <div class="flex-2 mg-l-1">
            <div class="box bg-grey inline-block wp-100 pd-h-5">
                <p class="montserrat fs-22 mg-v-1 mg-l-4">Total Pemasukan</p>
                <p class="montserrat fs-30 fw-600 mg-v-1 mg-l-4">Rp{{ number_format($pemasukan, 0, ',', '.') }}</p>
            </div>
            <div class="box bg-grey inline-block wp-100 pd-v-10 mg-t-1">
                <p class="montserrat fs-22 mg-v-1 mg-l-4">Pendapatan Tahunan</p>
                <p class="montserrat fs-30 fw-600 mg-v-1 mg-l-4">{{ $pertumbuhan }}%</p>
            </div>
        </div>
    </div>
    <div class="flex jc-r ai-c mg-t-3">
        <a href="perusahaan/tambah" class="btn-tambah bg-orange td-0 louis fs-20">+ Tambah</a>
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
        @foreach ($pengeluaran as $p)    
        <tbody class="bg-white ta-c">
            <td class="pd-h-2">{{ $p->tgl }}</td>
            <td class="pd-h-2">Rp{{ $p->nominal }}</td>
            <td class="pd-h-2">{{ $p->bank }}</td>
            <td class="pd-h-2">{{ $p->rek }}</td>
            <td class="pd-h-2">{{ Str::words($p->ket, 3, '...') }}</td>
            <td class="pd-h-2"><a href="perusahaan/{{ $p->id }}" class="td-0 black"><i class="fas fa-info-circle"></i></a></td>
        </tbody>
        @endforeach
    </table>
    @if (count($pengeluaran)<1)
        <p class="louis ta-c">Pengeluaran tidak ada</p>
    @endif
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