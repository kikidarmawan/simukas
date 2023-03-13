<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaksi;

class SaldoMutasi extends Model
{
    use HasFactory;
    public $table = 'tb_saldo_mutasi';
    protected $fillable = ['id', 'id_saldo', 'jumlah', 'jumlah_sebelum', 'jumlah_sesudah', 'jns_transaksi', 'keterangan', 'id_transaksi', 'created_at', 'updated_at'];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id');
    }

    public function saldo()
    {
        return $this->belongsTo(Saldo::class, 'id_saldo', 'id');
    }
}
