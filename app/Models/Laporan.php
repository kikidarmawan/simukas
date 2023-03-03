<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    public $table = 'riwayat_transaksi';
    protected $fillable = ['id', 'nm_transaksi', 'nominal', 'jenis_trx', 'tgl_transaksi', 'id_saldo', 'keterangan'];
}
