<?php

use App\Http\Controllers\Login;
use App\Http\Controllers\Register;
use App\Http\Controllers\Search;
use App\Http\Controllers\Toko;
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
Route::get('/produk/{id_produk}', function ($id_produk) {
    return view('produk',[
        "css" => "produk",
        "title" => "Produk",
        "id_produk" => $id_produk
    ]);
});
Route::get('/notifikasi', function () {
    return view('notif',[
        "css" => "notif",
        "title" => "Notifikasi"
    ]);
});
Route::get('/toko/{id_toko}', [Toko::class, 'index']);
Route::get('/checkout', function () {
    return view('checkout',[
        "css" => "checkout",
        "title" => "Checkout"
    ]);
});
Route::get('/chat', function () {
    return view('chat',[
        "css" => "chat",
        "title" => "Chat"
    ]);
});
Route::get('/bayar-transfer', function () {
    return view('bayar',[
        "css" => "bayar",
        "title" => "Bayar"
    ]);
});
Route::get('/bayar-qr', function () {
    return view('bayarqr',[
        "css" => "qr",
        "title" => "Bayar"
    ]);
});
Route::get('/upload', function () {
    return view('upload',[
        "css" => "upload",
        "title" => "Upload"
    ]);
});
Route::get('/pemesanan', function () {
    return view('pemesanan',[
        "css" => "pemesanan",
        "title" => "Pemesanan"
    ]);
});
Route::get('/pesanan-masuk', function () {
    return view('pesanan-masuk',[
        "css" => "pesanan-masuk",
        "title" => "Pesanan-masuk"
    ]);
});
Route::get('/produk', [Search::class, 'index']);
Route::get('/bantuan', function () {
    return view('bantuan',[
        "css" => "bantuan",
        "title" => "Bantuan"
    ]);
});
Route::get('/edit-akun', function () {
    return view('edit-akun',[
        "css" => "edit-akun",
        "title" => "Edit Akun"
    ]);
});
Route::get('/penjualan', function () {
    return view('penjualan',[
        "css" => "penjualan",
        "title" => "Penjualan"
    ]);
});
Route::get('/wishlist', function () {
    return view('wishlist',[
        "css" => "wishlist",
        "title" => "Wishlist"
    ]);
});
Route::get('/detail-pemesanan', function () {
    return view('detail-pemesanan',[
        "css" => "detail-pemesanan",
        "title" => "Detail Pemesanan"
    ]);
});
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
Route::get('/admin/kelolaAdmin', function () {
    return view('admin-kelolaAdmin',[
        "title" => "Admin - Tambah Admin"
    ]);
});
