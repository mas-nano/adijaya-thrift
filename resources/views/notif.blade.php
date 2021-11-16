@extends('layouts.main')
@section('content')
<div class="wrapper">
    <input type="hidden" name="" id="_token" value="{{ csrf_token() }}">
    @foreach ($notif as $n)
    <div class="flex ai-c mv-1 notif" data-id="{{ $n->id }}" data-des="{{ $n->destinasi }}">
        <div class="f-10">
            <p class="montserrat fw-600 mg-l-1">{{ $n->subjudul }}</p>
            <p class="montserrat fw-500 mg-l-1">{{ $n->pesan }}</p>
        </div>
        <div class="f-1">
            <p><i class="fa fa-bell orange" aria-hidden="true"></i></p>
        </div>
    </div>
    @endforeach
    @if (count($notif)<1)
        <p class="montserrat ta-c">Tidak ada notifikasi</p>
    @endif
</div>
<script>
    $(".notif").click(function(){
        var des = $(this).data("des");
        $.ajax({
            url: `http://localhost:8000/notifikasi/${$(this).data("id")}`,
            type: "POST",
            dataType: "json",
            data: {
                _token: $("#_token").val()
            },
            success: function(){
                window.location.href = `http://localhost:8000/${des}`
            }
        })
    })
</script>
@endsection