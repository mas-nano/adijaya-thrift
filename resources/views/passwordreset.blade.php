@extends('layouts.main')
@section('content')
    
<p class="title masuk">Lupa Kata Sandi</p>
<div class="form-login">
    <form action="" method="post">
        @csrf
        <input type="text" name="email" id="email" class="form-input" placeholder="Email">
        <input type="password" name="password" id="email" class="form-input" placeholder="Kata Sandi Baru">
        <input type="password" name="password_confirmation" id="email" class="form-input" placeholder="Konfirmasi Kata Sandi">
        <button type="submit" name="login" class="btn-login">Ubah Kata Sandi</button>
    </form>
</div>
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
@endsection