@extends('layouts.main')
@section('content')
    
<p class="title masuk">Daftar</p>
<div class="form-login">
    <form action="" method="post">
        @csrf
        <input type="text" name="name" id="nama" class="form-input" placeholder="Nama" required>
        <input type="text" name="username" id="username" class="form-input" placeholder="Nama Pengguna" required>
        <input type="email" name="email" id="email" class="form-input" placeholder="Email" required>
        <input type="password" name="password" id="password" class="form-input" placeholder="Kata Sandi" required>
        <p class="p">Sudah punya akun? <a href="/login">MASUK</a></p>
        <button type="submit" name="daftar" class="btn-daftar">Buat Akun</button>
    </form>
    
    @if (isset($data))
    @foreach ($data as $item)
        @foreach ($item as $msg)
        <div class="message warn">
            <p class="center">{{ $msg }}</p>
        </div>
        
        @endforeach
    @endforeach
    @endif
</div>
</div>
@endsection