<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaldoMutasi extends Model
{
    use HasFactory;
    public $table = 'tb_saldo_mutasi';
    protected $fillable = ['id', 'id_saldo', 'jumlah', 'jumlah_sebelum', 'jumlah_sesudah', 'jns_transaksi', 'keterangan', 'id_transaksi', 'created_at', 'updated_at'];
}
