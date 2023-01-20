<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    public $table = 'tb_pengguna';
    protected $fillable = ['id', 'nm_pengguna', 'tempat_tinggal', 'jumlah_pengeluaran', 'jumlah_pemasukan', 'created_at', 'updated_at'];
}
