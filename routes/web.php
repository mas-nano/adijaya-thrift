<?php

use App\Http\Controllers\AdminBantuan;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLogin;
use App\Http\Controllers\AdminProduk;
use App\Http\Controllers\AdminUser;
use App\Http\Controllers\Akun;
use App\Http\Controllers\Bantuan;
use App\Http\Controllers\Checkout;
use App\Http\Controllers\DetailPesan;
use App\Http\Controllers\KelolaAdmin;
use App\Http\Controllers\Login;
use App\Http\Controllers\Logout;
use App\Http\Controllers\Pembayaran;
use App\Http\Controllers\Penawaran;
use App\Http\Controllers\Pesanan;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProdukToko;
use App\Http\Controllers\Register;
use App\Http\Controllers\Riwayat;
use App\Http\Controllers\Search;
use App\Http\Controllers\Toko;
use App\Http\Controllers\Wishlist;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home',[
        "css" => "home",
        "title" => "Beranda"
    ]);
});
Route::get('/login', [Login::class, 'index'])->name('login');
Route::post('/login', [Login::class, 'login']);
Route::get('/daftar', [Register::class, 'index']);
Route::post('/daftar', [Register::class, 'create']);
Route::get('/produk/{produk}', [ProdukToko::class, 'show']);
Route::post('/produk/{produk}', [ProdukToko::class, 'store']);
Route::get('/notifikasi', function () {
    return view('notif',[
        "css" => "notif",
        "title" => "Notifikasi"
    ]);
});
Route::get('/toko/{user}', [Toko::class, 'index']);
Route::get('/checkout/{produk}', [Checkout::class, 'index']);
Route::post('/checkout/{produk}', [Checkout::class, 'store']);
Route::get('/panduan', function () {
    return view('panduan',[
        "css" => "panduan",
        "title" => "Panduan"
    ]);
});

Route::get('/chat', function () {
    return view('chat',[
        "css" => "chat",
        "title" => "Chat"
    ]);
});
Route::get('/pembayaran/{pembayaran}', [Pembayaran::class, 'index']);
Route::post('/pembayaran/{pembayaran}', [Pembayaran::class, 'update']);
Route::get('/kelolaProduk', [ProdukController::class, 'index']);
Route::post('/kelolaProduk', [ProdukController::class, 'store']);
Route::get('/kelolaProduk/{produk}', [ProdukController::class, 'show']);
Route::post('/kelolaProduk/{produk}', [ProdukController::class, 'update']);
Route::get('/riwayat', function () {
    return view('pemesanan',[
        "css" => "pemesanan",
        "title" => "Riwayat"
    ]);
});
Route::get('/pesanan-masuk', [Pesanan::class, 'index']);
Route::post('/pesanan-masuk', [Pesanan::class, 'search']);
Route::get('/produk', [Search::class, 'index']);
Route::get('/bantuan', [Bantuan::class, 'index']);
Route::post('/bantuan', [Bantuan::class, 'store']);
Route::get('/produk-toko', [ProdukToko::class, 'index']);
Route::get('/akun', [Akun::class, 'index']);
Route::post('/akun', [Akun::class, 'update']);
Route::get('/penjualan', function () {
    return view('penjualan',[
        "css" => "penjualan",
        "title" => "Penjualan"
    ]);
});
Route::get('/wishlist', [Wishlist::class, 'index']);
Route::get('/detail-pemesanan/{pemesanan}', [DetailPesan::class, 'index']);
Route::post('/detail-pemesanan/{pemesanan}', [DetailPesan::class, 'update']);
Route::get('/laporan-penjualan', function () {
    return view('laporan-penjualan',[
        "css" => "laporan-penjualan",
        "title" => "Laporan Penjualan"
    ]);
});
Route::get('/riwayat-penjualan', [Riwayat::class, 'index']);
Route::post('/riwayat-penjualan', [Riwayat::class, 'search']);
Route::post('/riwayat-penjualan/ajukan', [Riwayat::class, 'ajukan']);
Route::get('/penawaran', [Penawaran::class, 'index']);
Route::post('/penawaran', [Penawaran::class, 'update']);
Route::get('/admin', [AdminLogin::class, 'login']);
Route::post('/admin', [AdminLogin::class, 'postLogin']);
Route::get('/admin/dashboard', function () {
    return view('admin-dashboard',[
        "title" => "Dashboard"
    ]);
});
Route::get('/admin/admin', [AdminController::class, 'listAdmin']);
Route::get('/admin/admin/tambah', [AdminController::class, 'tambahAdmin']);
Route::post('/admin/admin/tambah', [AdminController::class, 'postTambahAdmin']);
Route::get('/admin/admin/ubah/{admin}', [AdminController::class, 'ubahAdmin']);
Route::post('/admin/admin/ubah/{admin}', [AdminController::class, 'postUbahAdmin']);
Route::delete('/admin/admin/hapus/{admin}', [AdminController::class, 'hapusAdmin']);
Route::get('/admin/pengguna', [AdminUser::class, 'listUser']);
Route::get('/admin/pengguna/ubah/{user}', [AdminUser::class, 'ubahUser']);
Route::post('/admin/pengguna/ubah/{user}', [AdminUser::class, 'postUbahUser']);
Route::get('/admin/pengguna/tambah', [AdminUser::class, 'tambahUser']);
Route::post('/admin/pengguna/tambah', [AdminUser::class, 'postTambahUser']);
Route::delete('/admin/pengguna/hapus/{user}', [AdminUser::class, 'hapusUser']);
Route::get('/admin/bantuan', [AdminBantuan::class, 'index']);
Route::get('/admin/bantuan/{bantuan}', [AdminBantuan::class, 'show']);
Route::post('/admin/bantuan/balas/{bantuan}', [AdminBantuan::class, 'update']);
Route::get('/admin/perusahaan', function () {
    return view('admin-perusahaan',[
        "title" => "Perusahaan"
    ]);
});
Route::get('/admin/kelolaDana', function () {
    return view('admin-kelolaDana',[
        "title" => "Perusahaan"
    ]);
});
Route::get('/admin/pencairan', function () {
    return view('admin-pencairanList',[
        "title" => "Pencairan"
    ]);
});
Route::get('/admin/kelolaPencairan', function () {
    return view('admin-pencairan',[
        "title" => "Pencairan"
    ]);
});
Route::get('/admin/konfirmasi', function () {
    return view('admin-konfirmasiList',[
        "title" => "Konfirmasi"
    ]);
});
Route::get('/admin/kelolaKonfirmasi', function () {
    return view('admin-konfirmasi',[
        "title" => "Konfirmasi"
    ]);
});
Route::get('/admin/produk', [AdminProduk::class, 'index']);
Route::get('/admin/produk/ubah/{produk}', [AdminProduk::class, 'ubah']);
Route::post('/admin/produk/ubah/{produk}', [AdminProduk::class, 'postUbah']);
Route::delete('/admin/produk/hapus/{produk}', [AdminProduk::class, 'hapus']);
Route::get('/admin/kelolaProduk', function () {
    return view('admin-kelolaProduk',[
        "title" => "Produk"
    ]);
});
Route::get('/logout', [Logout::class, 'index']);
Route::get('/admin/logout', [Logout::class, 'admin']);
