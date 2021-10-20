@extends('layouts.admin')
@section('content')
    <img src="../img/phooo 2.png" alt="" class="mg-l-4 absolute z-1">
    <div class="full flex vh-c">
        <form action="" method="post" class="w-350">
            <p class="ta-c montserrat fs-16 fw-600">Masuk</p>
            <input type="text" name="id" id="id" class="input block bg-grey louis fs-16 mg-b-2" placeholder="ID">
            <input type="text" name="id" id="id" class="input block bg-grey louis fs-16 mg-b-2" placeholder="Kata Sandi">
            <button type="submit" class="btn bg-orange block montserrat fs-16 fw-600 center">Masuk</button>
        </form>
    </div>
@endsection