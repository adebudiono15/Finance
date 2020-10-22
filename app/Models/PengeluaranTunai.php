<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengeluaranTunai extends Model
{
    protected $table = 'pengeluaran_tunai';
    protected $fillable = ['id',
    'kode_pengeluaran',
    'tanggal',
    'jenis_pengeluaran',
    'jumlah_pengeluaran',
    'keterangan',
    'divisi',
    ];
}
