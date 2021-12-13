@extends('layouts.main')
@section('content')
    
<p class="title masuk">Masuk</p>
<div class="form-login">
    <form action="" method="post">
        @csrf
        <input type="text" name="username" id="nama" class="form-input" placeholder="Nama pengguna">
        <input type="password" name="password" id="password" class="form-input" placeholder="Kata Sandi">
        <p><a href="/login/reset">Lupa Kata Sandi?</a></p>
        <p>Tidak punya akun? <a href="/daftar">DAFTAR</a></p>
        <button type="submit" name="login" class="btn-login">Masuk</button>
    </form>
</div>
@if (isset($message))
    <div class="message warn">
        <p class="center">{{ $message }}</p>
    </div>
@endif
@if (session('message'))
    <div class="message warn">
        <p class="center">{{ session('message') }}</p>
    </div>
@endif
</div>
@endsection
        