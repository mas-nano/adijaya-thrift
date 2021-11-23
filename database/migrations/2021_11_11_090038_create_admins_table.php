<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('id_admin');
            $table->string('nama');
            $table->string('email');
            $table->timestamps();
        });
        DB::table('admins')->insert(array(
            'username'=>'admin',
            'password'=>password_hash('admin', PASSWORD_DEFAULT),
            'id_admin'=>'001',
            'nama'=>'Admin',
            'email'=>'admin@adijaya.com'
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
