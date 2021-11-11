@extends('layouts.admin')
@section('content')
    <img src="../img/phooo 2.png" alt="" class="mg-l-4 absolute z-1">
    <div class="full flex vh-c">
        <form action="" method="post" class="w-350">
            @csrf
            <p class="ta-c montserrat fs-30 fw-600">Masuk</p>
            <input type="text" name="username" id="username" class="input block bg-grey louis fs-16 mg-b-2 b-0" placeholder="Nama Pengguna">
            <input type="password" name="password" id="password" class="input block bg-grey louis fs-16 mg-b-2 b-0" placeholder="Kata sandi">
            <button type="submit" class="btn bg-orange block montserrat fs-16 fw-600 center pointer">Masuk</button>
            <br>
            @if (isset($data))
            <p class="louis fs-24 ta-c red">Login gagal nama pengguna/password salah</p>
            @endif
        </form>
    </div>
@endsection