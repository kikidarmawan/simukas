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
            $table->dateTime('tgl_transaksi');
            $table->string('nm_transaksi');
            $table->string('keterangan')->nullable();
            $table->bigInteger('id_saldo')->unsigned();
            $table->enum('jenis_trx', ['pemasukan', 'pengeluaran']);
            $table->string('jumlah'); 
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
        Schema::dropIfExists('tb_transaksi');
    }
}
