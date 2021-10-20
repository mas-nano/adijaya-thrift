<?php

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
Route::get('/login', function () {
    return view('login',[
        "css" => "login",
        "title" => "Masuk"
    ]);
});
Route::post('/login', function () {
    return view('login',[
        "css" => "login",
        "title" => "Masuk"
    ]);
});
Route::get('/daftar', function () {
    return view('daftar',[
        "css" => "register",
        "title" => "Daftar"
    ]);
});
Route::get('/produk', function () {
    return view('produk',[
        "css" => "produk",
        "title" => "Produk"
    ]);
});
Route::get('/toko', function () {
    return view('toko',[
        "css" => "profilToko-review",
        "title" => "Aulia Dewi"
    ]);
});
Route::get('/search', function () {
    return view('search',[
        "css" => "search",
        "title" => "Search"
    ]);
});
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
Route::get('/cari', function () {
    return view('cari',[
        "css" => "cari",
        "title" => "Cari"
    ]);
});
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
