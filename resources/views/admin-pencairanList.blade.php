@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <p class="ta-c montserrat fs-36 fw-600">Pencairan dana</p>
    <div class="flex jc-r ai-c">
        <select name="sort" id="sort" class="louis fs-20 br-18">
            <option value="">Filter</option>
            <option value="Sudah Dicairkan" {{ ($req=='Sudah Dicairkan'?"selected":"") }}>Sudah Dicairkan</option>
            <option value="Belum Dicairkan" {{ ($req=='Belum Dicairkan'?"selected":"") }}>Belum Dicairkan</option>
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
        @foreach ($pencairan as $p)    
        <tbody class="bg-white ta-c">
            <td class="pd-h-2">{{ $p->pemesanan->id }}</td>
            <td class="pd-h-2">{{ $p->tgl_ajukan }}</td>
            <td class="pd-h-2">{{ ($p->tgl_cair?$p->tgl_cair:"-") }}</td>
            <td class="pd-h-2">{{ '@'.$p->pemesanan->penjual->username }}</td>
            <td class="pd-h-2">{{ $p->pemesanan->penjual->bank }}</td>
            <td class="pd-h-2">{{ $p->pemesanan->penjual->rek }}</td>
            <td class="pd-h-2 {{ ($p->pemesanan->status_ajukan=="Sudah dicairkan"?"green":"red") }}">{{ $p->pemesanan->status_ajukan }}</td>
            <td class="pd-h-2"><span class="mg-h-1">
                @if ($p->pemesanan->status_ajukan=="Belum dicairkan")    
                <a href="pencairan/{{ $p->id }}" class="td-0 black"><i class="fas fa-exchange-alt"></i></a>
                @endif
            </span></td>
        </tbody>
        @endforeach
    </table>
    @if (count($pencairan)<1)
        <p class="louis ta-c">Pencairan dana tidak ditemukan</p>
    @endif
</div>
<script>
    $("#sort").change(function(){
        window.location.href = `http://localhost:8000/admin/pencairan?sort=${$("#sort").val()}`;
    })
</script>
@endsection