<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->nullable();
            $table->foreignId('cars_id')->nullable();
            $table->foreignId('banks_id')->nullable();
            $table->string('invoice')->nullable();
            $table->string('nama');
            $table->string('email');
            $table->string('no_handphone');
            $table->string('mobil');
            $table->string('harga');
            $table->string('nama_bank');
            $table->string('atas_nama');
            $table->string('norek');
            $table->string('total_bayar');
            $table->string('bukti_Bayar');
            $table->string('total_denda');
            $table->date('start_date');
            $table->string('durasi');
            $table->date('end_date');
            $table->date('return_date')->nullable();
            $table->enum('status',['1','2','3','4','5','6']);
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
        Schema::dropIfExists('transactions');
    }
}
