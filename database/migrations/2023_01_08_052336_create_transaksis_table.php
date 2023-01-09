<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_kegiatan')->unsigned();
            $table->bigInteger('id_saldo')->unsigned();
            $table->string('nm_transaksi');
            $table->string('jumlah');
            // $table->enum('jenis_trx', ['pemasukan', 'pengeluaran']);
            $table->dateTime('tgl_transaksi');
            $table->string('bukti')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('tb_user')->onDelete('cascade');
            $table->foreign('id_kegiatan')->references('id')->on('tb_kegiatan')->onDelete('cascade');
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
        Schema::dropIfExists('tb_transaksi');
    }
}
