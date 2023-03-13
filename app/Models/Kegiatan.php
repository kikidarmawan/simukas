<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    public $table = 'tb_kegiatan';
    protected $fillable = ['id', 'nm_kegiatan', 'tgl_kegiatan', 'jumlah_pengeluaran', 'jumlah_pemasukan'];
}
