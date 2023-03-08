<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    public $table = 'tb_pengguna';
    protected $fillable = [ 'nama','jenis_kelamin','alamat'];
}
