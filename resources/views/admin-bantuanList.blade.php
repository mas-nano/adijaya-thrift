@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <p class="ta-c montserrat fs-36 fw-600">Bantuan</p>
    <div class="flex jc-r ai-c">
        <select name="sort" id="sort" class="louis fs-20 br-18">
            <option value="">Filter</option>
            <option value="Selesai">Selesai</option>
            <option value="Belum Tindakan">Belum Tindakan</option>
        </select>
    </div>
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
        <tbody class="bg-white ta-c">
            <td class="pd-h-2">03/10/2021</td>
            <td class="pd-h-2">03/10/2021</td>
            <td class="pd-h-2">@yefichlr</td>
            <td class="pd-h-2">laraswahyu@gmail.com</td>
            <td class="pd-h-2">Produk habis....</td>
            <td class="pd-h-2 green">Selesai</td>
            <td class="pd-h-2"><span class="pointer mg-h-1"><a href="detail-bantuan" class="td-0 black"><i class="fas fa-reply"></i></a></span></td>
        </tbody>
        <tbody class="bg-white ta-c">
            <td class="pd-h-2">03/10/2021</td>
            <td class="pd-h-2">03/10/2021</td>
            <td class="pd-h-2">@yefichlr</td>
            <td class="pd-h-2">laraswahyu@gmail.com</td>
            <td class="pd-h-2">Produk habis....</td>
            <td class="pd-h-2 red">Belum Tindakan</td>
            <td class="pd-h-2"><span class="pointer mg-h-1"><a href="detail-bantuan" class="td-0 black"><i class="fas fa-reply"></i></a></span></td>
        </tbody>
        
    </table>
</div>
@endsection