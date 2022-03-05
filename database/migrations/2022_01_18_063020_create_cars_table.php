<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id');
            $table->enum('transmisi', ['manual', 'otomatis','semi-otomatis']);
            $table->integer('tempat_duduk');
            $table->integer('bagasi');
            $table->string('nama_mobil');
            $table->text('description');
            $table->string('harga', 8);
            $table->string('denda', 8);
            $table->string('gambar')->nullable();
            $table->enum('status',['ready','tidak']);
            $table->enum('sopir',['ready','tidak']);
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
        Schema::dropIfExists('cars');
    }
}
