<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pembayaran_id');
            $table->foreignId('produk_id');
            $table->foreignId('user_id');
            $table->foreignId('penjual_id');
            $table->string('status_pembeli')->nullable();
            $table->string('status_admin')->nullable();
            $table->string('status_kirim')->nullable();
            $table->string('status_terima')->nullable();
            $table->string('status_ajukan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanans');
    }
}
