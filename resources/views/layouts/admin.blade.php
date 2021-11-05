<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - {{ $title }}</title>
    <link rel="stylesheet" href="http://localhost:8000/css/style-admin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,600,500">
    <script src="https://kit.fontawesome.com/e4b2ccaaa5.js" crossorigin="anonymous"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="sidenav" style="{{ $title === "Login"?"display: none;":"" }}">
        <div class="" id="logo">
            <img src="../img/phooo 1.png" alt="" class="logo mg-v-1 pointer">
        </div>
        <p class="ta-c mg-b-4 icon"><a href="dashboard" class="{{ ($title=="Dashboard"?"orange":"black") }} td-0"><i class="fas fa-home fs-22 fa-fw"></i> <span class="montserrat fs-16 none icon-det">Beranda</span></a></p>
        <p class="ta-c mg-b-4 icon"><a href="pengguna" class="{{ ($title=="Pengguna"?"orange":"black") }} td-0"><i class="fas fa-users fs-22 fa-fw"></i> <span class="montserrat fs-16 none icon-det">Pengguna</span></p>
        <p class="ta-c mg-b-4 icon"><a href="bantuan" class="{{ ($title=="Bantuan"?"orange":"black") }} td-0"><i class="fas fa-question-circle fs-22 fa-fw"></i> <span class="montserrat fs-16 none icon-det">Bantuan</span></p>
        <p class="ta-c mg-b-4 icon"><a href="perusahaan" class="{{ ($title=="Perusahaan"?"orange":"black") }} td-0"><i class="far fa-money-bill-alt fs-22 fa-fw"></i> <span class="montserrat fs-16 none icon-det">Perusahaan</span></p>
        <p class="ta-c mg-b-4 icon"><a href="pencairan" class="{{ ($title=="Pencairan"?"orange":"black") }} td-0"><i class="fas fa-wallet fs-22 fa-fw"></i> <span class="montserrat fs-16 none icon-det">Pencairan</span></p>
        <p class="ta-c mg-b-4 icon"><a href="konfirmasi" class="{{ ($title=="Konfirmasi"?"orange":"black") }} td-0"><i class="fas fa-clipboard-check fs-22 fa-fw"></i> <span class="montserrat fs-16 none icon-det">Konfirmasi</span></p>
        <p class="ta-c mg-b-4 icon"><a href="admin" class="{{ ($title=="Admin"?"orange":"black") }} td-0"><i class="fas fa-id-card fs-22 fa-fw"></i> <span class="montserrat fs-16 none icon-det">Admin</span></p>
        <p class="ta-c mg-b-4 icon"><a href="produk" class="{{ ($title=="Produk"?"orange":"black") }} td-0"><i class="fas fa-box-open fs-22 fa-fw"></i> <span class="montserrat fs-16 none icon-det">Produk</span></p>
        <p class="ta-c mg-b-4 icon absolute b0 l0"><a href="" class="td-0 black"><i class="fas fa-sign-out-alt fs-22 fa-fw"></i> <span class="montserrat fs-16 none icon-det">Keluar</span></a></p>
    </div>
    <div class="content">
        @yield('content')
    </div>
    <script src="../js/sidenav.js"></script>
</body>
</html>