@extends('layouts.admin')
@section('content')
    <div class="wrapper">
        <p class="ta-c montserrat fs-36 fw-600">Bantuan</p>
        <div class="box pd-5">
            <div class="flex ai-c">
                <img src="http://localhost:8000/img/uploads/profile_images/{{ $bantuan->user->photo }}" alt="" class="img">
                <div class="mg-l-3">
                    <p class="montserrat fw-500 fs-20">{{ $bantuan->user->name }}</p>
                    <p class="louis fs-20">{{ $bantuan->user->email }}</p>
                </div>
            </div>
            <p class="montserrat fw-600 fs-24">{{ $bantuan->permasalahan }}</p>
            <p class="louis fs-20">{{ $bantuan->pesan }}</p>
        </div>
    </div>
@endsection