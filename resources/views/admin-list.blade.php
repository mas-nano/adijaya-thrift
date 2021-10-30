@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <p class="ta-c montserrat fs-36 fw-600">Admin</p>
    <div class="flex jc-r ai-c">
        <a href="" class="btn-tambah bg-orange mg-r-2 td-0 louis fs-20">+ Tambah</a>
        <form action="" method="get" class="w-300">
            <label for="search" class="louis fs-14 mg-r-2">Search</label>
            <input type="text" name="search" id="search" class="input-search">
        </form>
    </div>
    <table class="bg-grey table mg-t-3 louis fs-14">
        <thead class="ta-c">
            <td class="pd-h-2">No</td>
            <td class="pd-h-2">Nama</td>
            <td class="pd-h-2">ID Admin</td>
            <td class="pd-h-2">Username</td>
            <td class="pd-h-2">Email</td>
            <td class="pd-h-2"></td>
        </thead>
        <tbody class="bg-white ta-c">
            <td class="pd-h-2">1</td>
            <td class="pd-h-2">Dandy</td>
            <td class="pd-h-2">1</td>
            <td class="pd-h-2">dandy</td>
            <td class="pd-h-2">dandy</td>
            <td class="pd-h-2"><i class="fas fa-pen"></i> <i class="fas fa-trash red"></i></td>
        </tbody>
    </table>
</div>
@endsection