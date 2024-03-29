<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengeluaranBank extends Model
{
    protected $table = 'pengeluaran_bank';
    protected $fillable = ['id',
    'kode_pengeluaran',
    'tanggal',
    'jenis_pengeluaran',
    'jumlah_pengeluaran',
    'keterangan',
    'bank',
    'divisi',
    ];
}
