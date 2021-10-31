@extends('layouts.admin')
@section('content')
    <div class="wrapper">
        <div class="box pd-5">
            <form action="" method="post" class="center wp-50">
                <input type="hidden" name="id" value="">
                <p class="montserrat fw-600 fs-30">ID pesanan: <span>001</span></p>
                <p class="montserrat fw-600 fs-30">Total: <span>520.000</span></p>
                <p class="montserrat fw-600 fs-30">Bank: <span>Mandiri</span></p>
                <p class="montserrat fw-600 fs-30">No. rekening: <span>00092845</span></p>
                <button type="submit" class="btn montserrat fw-600 fs-30 mg-ha-v-3 block bg-orange pointer">Kirim</button>
            </form>
        </div>
    </div>
@endsection