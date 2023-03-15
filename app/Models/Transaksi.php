<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Transaksi extends Model
{
    use HasFactory;
    public $table = 'tb_transaksi';
    protected $primaryKey = "id";
    protected $fillable = [
        'id_user',
        'id_kegiatan',
        'id_saldo',
        'nm_transaksi',
        'jenis_trx',
        'jumlah',
        'tgl_transaksi',
        'bukti',
        'keterangan'
        ];


        /**
         * Get the kegiatan that owns the Transaksi
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function kegiatan()
        {
            return $this->belongsTo(kegiatan::class, "id_kegiatan", "id");
        }
};




