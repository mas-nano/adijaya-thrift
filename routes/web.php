<?php

use App\Http\Controllers\Akun;
use App\Http\Controllers\Chat;
use App\Http\Controllers\Home;
use App\Http\Controllers\Toko;
use App\Http\Controllers\Login;
use App\Http\Controllers\Notif;
use App\Http\Controllers\Logout;
use App\Http\Controllers\Search;
use App\Http\Controllers\Bantuan;
use App\Http\Controllers\Pesanan;
use App\Http\Controllers\Riwayat;
use App\Http\Controllers\Checkout;
use App\Http\Controllers\Register;
use App\Http\Controllers\Wishlist;
use App\Http\Controllers\AdminDana;
use App\Http\Controllers\AdminUser;
use App\Http\Controllers\Penawaran;
use App\Http\Controllers\Penjualan;
use App\Http\Controllers\AdminLogin;
use App\Http\Controllers\Pembayaran;
use App\Http\Controllers\ProdukToko;
use App\Http\Controllers\AdminProduk;
use App\Http\Controllers\DetailPesan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminBantuan;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\AdminPencairan;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminKonfirmasi;
use App\Http\Controllers\ProdukController;

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

Route::get("/", [Home::class, "index"]);
Route::get("/home/{take}", [Home::class, "more"]);
Route::get("/login", [Login::class, "index"])->name("login");
Route::post("/login", [Login::class, "login"]);
Route::get("/login/reset", [ResetPassword::class, "index"]);
Route::post("/login/reset", [ResetPassword::class, "send"]);
Route::get("/login/reset-password/{token}", [ResetPassword::class, "verify"]);
Route::post("/login/reset-password/{token}", [
    ResetPassword::class,
    "postPassword",
]);
Route::get("/daftar", [Register::class, "index"]);
Route::post("/daftar", [Register::class, "create"]);
Route::get("/produk/{produk}", [ProdukToko::class, "show"]);
Route::post("/produk/{produk}", [ProdukToko::class, "store"]);
Route::post("/produk/{produk}/chat", [ProdukToko::class, "chat"]);
Route::get("/notifikasi", [Notif::class, "index"]);
Route::post("/notifikasi/{notification}", [Notif::class, "update"]);
Route::get("/toko/{user}", [Toko::class, "index"]);
Route::get("/toko/{user}/produk", [Toko::class, "produk"]);
Route::get("/checkout/{produk}", [Checkout::class, "index"]);
Route::post("/checkout/{produk}", [Checkout::class, "store"]);
Route::get("/chat", [Chat::class, "index"]);
Route::get("/chat/{userChat}", [Chat::class, "showMessage"]);
Route::post("/chat/{userChat}", [Chat::class, "send"]);
Route::get("/chat/latest/{userChat}", [Chat::class, "latestMessage"]);
Route::get("/chat/latest/user/get", [Chat::class, "userLatest"]);
Route::get("/pembayaran/{pembayaran}", [Pembayaran::class, "index"]);
Route::post("/pembayaran/{pembayaran}", [Pembayaran::class, "update"]);
Route::delete("/pembayaran/{pembayaran}", [Pembayaran::class, "destroy"]);
Route::get("/kelolaProduk", [ProdukController::class, "index"]);
Route::post("/kelolaProduk", [ProdukController::class, "store"]);
Route::get("/kelolaProduk/{produk}", [ProdukController::class, "show"]);
Route::post("/kelolaProduk/{produk}", [ProdukController::class, "update"]);
Route::get("/riwayat", [Riwayat::class, "pembeli"]);
Route::get("/riwayat/pemesanan", [Riwayat::class, "pemesanan"]);
Route::get("/riwayat/penawaran", [Riwayat::class, "penawaran"]);
Route::get("/pesanan-masuk", [Pesanan::class, "index"]);
Route::post("/pesanan-masuk", [Pesanan::class, "search"]);
Route::get("/produk", [Search::class, "index"]);
Route::get("/produk/search/{take}", [Search::class, "search"]);
Route::get("/bantuan", [Bantuan::class, "index"]);
Route::post("/bantuan", [Bantuan::class, "store"]);
Route::get("/produk-toko", [ProdukToko::class, "index"]);
Route::get("/akun", [Akun::class, "index"]);
Route::post("/akun", [Akun::class, "update"]);
Route::get("/penjualan", [Penjualan::class, "index"]);
Route::get("/wishlist", [Wishlist::class, "index"]);
Route::post("/wishlist", [Wishlist::class, "store"]);
Route::delete("/wishlist/{wishlist}", [Wishlist::class, "destroy"]);
Route::get("/detail-pemesanan/{pemesanan}", [DetailPesan::class, "index"]);
Route::post("/detail-pemesanan/{pemesanan}", [DetailPesan::class, "update"]);
Route::get("/laporan-penjualan", [Penjualan::class, "detail"]);
Route::get("/riwayat-penjualan", [Riwayat::class, "index"]);
Route::post("/riwayat-penjualan", [Riwayat::class, "search"]);
Route::post("/riwayat-penjualan/ajukan", [Riwayat::class, "ajukan"]);
Route::get("/penawaran", [Penawaran::class, "index"]);
Route::post("/penawaran", [Penawaran::class, "update"]);
Route::get("/admin", [AdminLogin::class, "login"]);
Route::post("/admin", [AdminLogin::class, "postLogin"]);
Route::get("/admin/dashboard", [AdminDashboard::class, "index"]);
Route::get("/admin/admin", [AdminController::class, "listAdmin"]);
Route::get("/admin/admin/tambah", [AdminController::class, "tambahAdmin"]);
Route::post("/admin/admin/tambah", [AdminController::class, "postTambahAdmin"]);
Route::get("/admin/admin/ubah/{admin}", [AdminController::class, "ubahAdmin"]);
Route::post("/admin/admin/ubah/{admin}", [
    AdminController::class,
    "postUbahAdmin",
]);
Route::delete("/admin/admin/hapus/{admin}", [
    AdminController::class,
    "hapusAdmin",
]);
Route::get("/admin/pengguna", [AdminUser::class, "listUser"]);
Route::get("/admin/pengguna/ubah/{user}", [AdminUser::class, "ubahUser"]);
Route::post("/admin/pengguna/ubah/{user}", [AdminUser::class, "postUbahUser"]);
Route::get("/admin/pengguna/tambah", [AdminUser::class, "tambahUser"]);
Route::post("/admin/pengguna/tambah", [AdminUser::class, "postTambahUser"]);
Route::delete("/admin/pengguna/hapus/{user}", [AdminUser::class, "hapusUser"]);
Route::get("/admin/bantuan", [AdminBantuan::class, "index"]);
Route::get("/admin/bantuan/{bantuan}", [AdminBantuan::class, "show"]);
Route::post("/admin/bantuan/balas/{bantuan}", [AdminBantuan::class, "update"]);
Route::get("/admin/perusahaan", [AdminDana::class, "index"]);
Route::get("/admin/perusahaan/tambah", [AdminDana::class, "tambah"]);
Route::post("/admin/perusahaan/tambah", [AdminDana::class, "postTambah"]);
Route::get("/admin/perusahaan/{pengeluaran}", [AdminDana::class, "show"]);
Route::get("/admin/pencairan", [AdminPencairan::class, "index"]);
Route::get("/admin/pencairan/{penarikan}", [AdminPencairan::class, "show"]);
Route::post("/admin/pencairan/{penarikan}", [AdminPencairan::class, "update"]);
Route::get("/admin/konfirmasi", [AdminKonfirmasi::class, "index"]);
Route::get("/admin/konfirmasi/{pemesanan}", [AdminKonfirmasi::class, "show"]);
Route::post("/admin/konfirmasi/{pemesanan}", [
    AdminKonfirmasi::class,
    "update",
]);
Route::get("/admin/produk", [AdminProduk::class, "index"]);
Route::get("/admin/produk/ubah/{produk}", [AdminProduk::class, "ubah"]);
Route::post("/admin/produk/ubah/{produk}", [AdminProduk::class, "postUbah"]);
Route::delete("/admin/produk/hapus/{produk}", [AdminProduk::class, "hapus"]);
Route::get("/logout", [Logout::class, "index"]);
Route::get("/admin/logout", [Logout::class, "admin"]);
Route::get("kota", [Akun::class, "getKota"]);
