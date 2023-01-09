<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaldoMutasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_saldo_mutasi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_saldo')->unsigned();
            $table->double('jumlah');
            $table->double('jumlah_sebelum');
            $table->double('jumlah_sesudah');
            $table->string('jns_transaksi');
            $table->bigInteger('id_transaksi')->unsigned();
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_saldo')->references('id')->on('tb_saldo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_saldo_mutasi');
    }
}
