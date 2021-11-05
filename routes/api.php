<?php

use Illuminate\Http\Request;
use App\Http\Controllers\UserAPI;
use App\Http\Controllers\LoginAPI;
use App\Http\Controllers\ProdukAPI;
use Illuminate\Support\Facades\Route;

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
Route::get('produk/{take}', [ProdukAPI::class, 'create']);