@extends('layouts.main')
@section('content')
    
<p class="title masuk">Masuk</p>
@if (session()->has('login'))
        <div class="message warn">
            <p class="center">{{ session('login') }}</p>
        </div>
@endif
<div class="form-login">
    <form action="" method="post">
        @csrf
        <input type="text" name="name" id="nama" class="form-input" placeholder="Email">
        <input type="password" name="password" id="password" class="form-input" placeholder="Kata Sandi">
        <p>Tidak punya akun? <a href="/daftar">DAFTAR</a></p>
        <button type="submit" name="login" class="btn-login">Login</button>
    </form>
</div>
</div>
@endsection
        