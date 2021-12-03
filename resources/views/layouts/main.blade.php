<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - Adijaya Thrift</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.png') }}"/>
    <link rel="stylesheet" href="{{ asset('css/navfoot.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-'.$css.'.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,600,500">
    <script src="https://kit.fontawesome.com/e4b2ccaaa5.js" crossorigin="anonymous"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="wrapper-navbar">
            <div class="navbar">
                <div class="brand-logo">
                    <img src="{{ asset('img/phooo 1.png') }}" alt="">
                </div>
                <div class="search">
                    <form action="/produk" method="get">
                        <input type="text" name="search" id="keyword" class="keyword" placeholder="Pencarian..." value="{{ (isset($res['s'])?$res['s']:'') }}" required>
                        <div class="search-logo">
                            <button type="submit" class="search-button"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
                <div class="link">
                    <ul>
                        <li><a class="{{ ($title === "Beranda")?"active":"" }}" href="/">Beranda</a></li>
                        <li><a class="{{ ($title === "Produk")?"active":"" }}" href="/produk">Produk</a></li>
                        @if (session('dataUser'))
                            <li><a class="{{ ($title === "Notifikasi")?"active":"" }}" href="/notifikasi"><i class="fa fa-bell" aria-hidden="true"></i></a></li>
                            <li><a class="{{ ($title === "Edit Akun")?"active":"" }}" href="/akun">Hi, {{ session('dataUser')['username'] }}</a></li>
                        @else
                            <li><a class="{{ ($title === "Masuk")?"active":"" }}" href="/login">Login</a></li>
                            <li><a class="{{ ($title === "Daftar")?"active":"" }}" href="/daftar">Daftar</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="content">
            @yield('content')
        </div>
        <div class="footer">
            <div class="wrapper-footer">
                <p class="title">ADIJAYA THRIFT</p>
                <p class="subtitle">Menawarkan layanan jual beli barang bekas di Indonesia</p>
                <p class="title">Layanan</p>
                <p class="subtitle"><a href="/bantuan">Bantuan</a></p>
            </div>
        </div>
    </div>
</body>
</html>