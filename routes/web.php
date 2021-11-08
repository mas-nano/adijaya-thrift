<?php

use App\Http\Controllers\Akun;
use App\Http\Controllers\Bantuan;
use App\Http\Controllers\Checkout;
use App\Http\Controllers\DetailPesan;
use App\Http\Controllers\KelolaAdmin;
use App\Http\Controllers\Login;
use App\Http\Controllers\Logout;
use App\Http\Controllers\Pembayaran;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProdukToko;
use App\Http\Controllers\Register;
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
Route::get('/pesanan-masuk', function () {
    return view('pesanan-masuk',[
        "css" => "pesanan-masuk",
        "title" => "Pesanan-masuk"
    ]);
});
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
Route::get('/laporan-penjualan', function () {
    return view('laporan-penjualan',[
        "css" => "laporan-penjualan",
        "title" => "Laporan Penjualan"
    ]);
});
Route::get('/riwayat-penjualan', function () {
    return view('riwayat-penjualan',[
        "css" => "riwayat-penjualan",
        "title" => "Riwayat Penjualan"
    ]);
});
Route::get('/penawaran', function () {
    return view('penawaran',[
        "css" => "penawaran",
        "title" => "Penawaran"
    ]);
});
Route::get('/admin/login', function () {
    return view('admin-login',[
        "title" => "Login"
    ]);
});
Route::get('/admin/dashboard', function () {
    return view('admin-dashboard',[
        "title" => "Dashboard"
    ]);
});
Route::get('/admin/kelolaUser', [KelolaAdmin::class, 'index']);
Route::get('/admin/admin', function () {
    return view('admin-list',[
        "title" => "Admin"
    ]);
});
Route::get('/admin/pengguna', function () {
    return view('admin-penggunaList',[
        "title" => "Pengguna"
    ]);
});
Route::get('/admin/bantuan', function () {
    return view('admin-bantuanList',[
        "title" => "Bantuan"
    ]);
});
Route::get('/admin/detail-bantuan', function () {
    return view('admin-bantuan',[
        "title" => "Bantuan"
    ]);
});
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
Route::get('/admin/produk', function () {
    return view('admin-produkList',[
        "title" => "Produk"
    ]);
});
Route::get('/admin/kelolaProduk', function () {
    return view('admin-kelolaProduk',[
        "title" => "Produk"
    ]);
});
Route::get('/logout', [Logout::class, 'index']);
