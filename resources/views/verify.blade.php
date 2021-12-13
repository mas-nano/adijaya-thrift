<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .btn-login {
        display: block;
        margin: 20px auto;
        width: 150px;
        padding: 10px 63px;
        background-color: white;
        color: #ff8d44;
        border-radius: 24px;
        border: none;
        font-family: "Montserrat", sans-serif;
        font-weight: 600;
        font-size: 24px;
    }
    a{
        text-align: center;
        text-decoration: none;
        color: white;
    }
    img{
        display: block;
        margin: auto;
    }
    .center{
        text-align: center;
    }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="">
        <img src="https://adijayathrift.herokuapp.com/assets/img/phooo%202.png" alt="" width="300">
        <p>Verifikasi email Anda untuk melakukan konfirmasi perubahan kata sandi</p>
        <a href="{{ url('/login/reset-password/'.$token) }}" class="btn-login">Klik Disini</a>
        <p>Catatan: Abaikan email ini jika bukan Anda yang melakukan</p>
        <p class="center">Adiijaya Thrift - {{ date('Y') }}</p>
    </div>
</body>
</html>