@extends('layouts.main')
@section('content')
    
<p class="title masuk">Lupa Kata Sandi</p>
<div class="form-login">
    <form action="" method="post">
        @csrf
        <p>Masukkan email yang terdaftar</p>
        <input type="text" name="email" id="email" class="form-input" placeholder="Email">
        <p>Tidak punya akun? <a href="/daftar">DAFTAR</a></p>
        <button type="submit" name="login" class="btn-login">Ubah Kata Sandi</button>
    </form>
</div>
@if (isset($message))
    <div class="message warn">
        <p class="center">{{ $message }}</p>
    </div>
@endif
</div>
@endsection
        