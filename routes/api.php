<?php

use Illuminate\Http\Request;
use App\Http\Controllers\UserAPI;
use App\Http\Controllers\LoginAPI;
use App\Http\Controllers\ProdukAPI;
use App\Http\Controllers\WishlistAPI;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemesananAPI;
use App\Http\Controllers\PenawaranAPI;
use App\Http\Controllers\PembayaranAPI;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('user', UserAPI::class);
Route::resource('login', LoginAPI::class);
Route::get('produk', [ProdukAPI::class, 'get']);
Route::get('produk/{produk}', [ProdukAPI::class, 'show']);
Route::get('rekomendasi/{user}', [ProdukAPI::class, 'index']);
Route::delete('pembayaran/{pembayaran}', [PembayaranAPI::class, 'destroy']);
Route::get('pemesanan', [PemesananAPI::class, 'index']);
Route::post('penawaran/{produk}', [PenawaranAPI::class, 'index']);
Route::post('wishlist', [WishlistAPI::class, 'store']);
Route::delete('wishlist/{wishlist}', [WishlistAPI::class, 'destroy']);