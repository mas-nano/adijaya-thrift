@extends('layouts.main')
@section('content')
<p class="title bantuan">BANTUAN</p>
<form action="" method="post" class="form-bantuan">
    @csrf
    <input type="hidden" name="user_id" value="{{ session('dataUser')['id'] }}">
    <label for="permasalahan">Permasalahan</label>
    <input type="text" name="permasalahan" id="permasalahan" class="form-input" placeholder="Permasalahan">
    <label for="deskripsi">Deskripsi</label>
    <textarea name="pesan" id="deskripsi" class="form-input deskripsi">Beri ID produk apabila permasalahan berkaitan dengan produk</textarea>
    <button type="submit" name="bantuan" class="btn-bantuan">Kirim</button>
    @if (isset($data))
    @foreach ($data as $item)
        @foreach ($item as $msg)
        <div class="message warn">
            <p class="center">{{ $msg }}</p>
        </div>
        
        @endforeach
    @endforeach
    @endif
</form>
@endsection