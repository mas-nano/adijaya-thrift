@extends('layouts.main')
@section('content')
@if (session('success'))
    {!! session('success') !!}
@else
    
<p class="title bantuan">BANTUAN</p>
<form action="" method="post" class="form-bantuan">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="user_id" value="{{ session('dataUser')?session('dataUser')['id']:"" }}">
    <label for="permasalahan">Permasalahan</label>
    <input type="text" name="permasalahan" id="permasalahan" class="form-input" placeholder="Permasalahan">
    <label for="deskripsi">Deskripsi</label>
    <textarea name="pesan" id="deskripsi" class="form-input deskripsi" placeholder="Beri ID produk apabila permasalahan berkaitan dengan produk"></textarea>
    <button type="submit" name="bantuan" class="btn-bantuan">Kirim</button>
    @if (session('data'))
    @foreach (session('data') as $item)
        @foreach ($item as $msg)
        <div class="message warn">
            <p class="center">{{ $msg }}</p>
        </div>
        
        @endforeach
    @endforeach
    @endif
</form>
@endif
@endsection