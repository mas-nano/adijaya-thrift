@extends('layouts.main')
@section('content')
<p class="title bantuan">BANTUAN</p>
<form action="" method="post" class="form-bantuan">
    <label for="permasalahan">Permasalahan</label>
    <input type="text" name="permasalahan" id="permasalahan" class="form-input">
    <label for="deskripsi">Deskripsi</label>
    <textarea name="deskripsi" id="deskripsi" class="form-input deskripsi"></textarea>
    <button type="submit" name="bantuan" class="btn-bantuan">Kirim</button>
</form>
@endsection