<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('no_handphone')->nullable();
            $table->string('username')->unique();
            // $table->string('jenis_kelamin')->nullable();
            // $table->string('alamat')->nullable();
            // $table->string('desa')->nullable();
            // $table->string('kecamatan')->nullable();
            // $table->string('kabupaten')->nullable();
            // $table->string('provinsi')->nullable();
            $table->enum('gender', ['P', 'L'])->nullable();
            // $table->string('nik')->nullable();
            // $table->string('foto_ktp')->nullable();
            // $table->string('google_id')->nullable();
            $table->enum('cek', ['full', 'kurang']);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
