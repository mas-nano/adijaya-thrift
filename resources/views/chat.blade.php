@extends('layouts.main')
@section('content')
@php
    $i=1;
    $j = 0;
@endphp
    <div class="wrapper-luar">
        <div class="left">
            @foreach ($chat as $c)    
            <div class="pengirim {{ ($i++==1?"click":"") }}" data-id="{{ $c->id }}">
                <div class="nama">
                    <p class="nama-asli">{{ ($c->penerima_id==session('dataUser')['id']?$c->user->name:$c->penerima->name) }}</p>
                    <p class="username">{{ ($c->penerima_id==session('dataUser')['id']?'@'.$c->user->username:'@'.$c->penerima->username) }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="split">
            <input type="hidden" name="" id="userChatId" value="{{ $chat->first()->id }}">
            <input type="hidden" name="" id="user_id" value="{{ session('dataUser')['id'] }}">
            <input type="hidden" name="" id="penerima_id" value="{{ $chat->first()->penerima_id }}">
        </div>
        <div class="right">
            <div class="pesan">
                <div class="wrapper-pesan">
                    @foreach ($pesan as $p)
                    <div class="{{ ($p->user_id==session('dataUser')['id']?"send":"receive") }} {{ (++$j==count($pesan)?"last":"") }}">
                        <p>{{ $p->pesan }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="input">
                <form action="" method="POST" id="form-send">
                    <input type="hidden" name="" id="_token" value="{{ csrf_token() }}">
                    <input type="text" name="pesan" id="pesan" placeholder="Ketik disini...">
                    <img src="{{ asset('img/send.png') }}" alt="" class="img-send">
                </form>
            </div>
        </div>
    </div>
    <script>
        @if(count($pesan)>0)
        var id = {{ $pesan[count($pesan)-1]->id }}
        @else
        0
        @endif
    </script>
    <script src="{{ asset('js/chat.js') }}"></script>
@endsection