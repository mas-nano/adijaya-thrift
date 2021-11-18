@extends('layouts.main')
@section('content')
    <div class="wrapper-luar">
        <div class="left">
            @foreach ($chat as $c)    
            <div class="pengirim click" data-id="{{ $c->id }}">
                <div class="nama">
                    <p class="nama-asli">{{ ($c->penerima_id==session('dataUser')['id']?$c->user->name:$c->penerima->name) }}</p>
                    <p class="username">{{ ($c->penerima_id==session('dataUser')['id']?'@'.$c->user->username:'@'.$c->penerima->username) }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="split"></div>
        <div class="right">
            <div class="pesan">
                <div class="wrapper-pesan">
                    @foreach ($pesan as $p)
                    <div class="{{ ($p->user_id==session('dataUser')['id']?"send":"receive") }}">
                        <p>{{ $p->pesan }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="input">
                <form action="" method="POST">
                    <input type="text" name="pesan" id="pesan" placeholder="Ketik disini...">
                    <img src="img/send.png" alt="" class="img-send">
                </form>
            </div>
        </div>
    </div>
@endsection