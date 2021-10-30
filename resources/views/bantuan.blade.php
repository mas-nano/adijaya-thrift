@extends('layouts.main')
@section('content')
<p class="title bantuan">BANTUAN</p>
<form action="" method="get" class="form-bantuan">
    <label for="permasalahan">Permasalahan</label>
    <input type="text" name="permasalahan" id="permasalahan" class="form-input" placeholder="Permasalahan">
    <label for="deskripsi">Deskripsi</label>
    <textarea name="deskripsi" id="deskripsi" class="form-input deskripsi">Beri ID produk apabila permasalahan berkaitan dengan produk</textarea>
    <button type="submit" name="bantuan" class="btn-bantuan">Kirim</button>
</form>
@endsection