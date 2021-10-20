@extends('layouts.main')
@section('content')
    
<p class="title masuk">Daftar</p>
<div class="form-login">
    <form action="" method="post">
        <input type="text" name="nama" id="nama" class="form-input" placeholder="Nama" required>
        <input type="text" name="username" id="username" class="form-input" placeholder="Nama Pengguna" required>
        <input type="email" name="email" id="email" class="form-input" placeholder="Email" required>
        <input type="password" name="password" id="password" class="form-input" placeholder="Kata Sandi" required>
        <input type="number" name="nomor-hp" id="nomor-hp" class="form-input" placeholder="Nomor Ponsel" required>
        <label for="tgl-lahir">Tanggal Lahir</label>
        <input type="date" name="tgl-lahir" id="tgl-lahir" class="form-input" placeholder="Tanggal Lahir" required>
        <p>Sudah punya akun? <a href="/login">MASUK</a></p>
        <button type="submit" name="daftar" class="btn-daftar">Buat Akun</button>
    </form>
</div>
</div>
@endsection