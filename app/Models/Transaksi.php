<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    public $table = 'tb_transaksi';
    protected $fillable = ['id', 'id_user',  'id_kegiatan', 'id_saldo', 'nm_transaksi', 'jns_transaksi', 'jumlah', 'tgl_transaksi', 'bukti', 'keterangan', 'created_at', 'updated_at'];
}
