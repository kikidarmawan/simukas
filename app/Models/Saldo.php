<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    use HasFactory;
    public $table = 'tb_saldo';
    protected $fillable = ['id', 'nm_saldo', 'jumlah', 'created_at', 'updated_at'];
}
