<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    public $table = 'tb_pengguna';
    protected $fillable = ['id', 'nm_pengguna', 'tempat_tinggal', 'nik', 'nis', 'created_at', 'updated_at'];
}
