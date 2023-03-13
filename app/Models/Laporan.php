<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SaldoMutasi;

class Laporan extends Model
{
    use HasFactory;
    public $table = 'tb_laporan';
    protected $fillable = [
        'id',
        'pengeluaran'
        ];
}
