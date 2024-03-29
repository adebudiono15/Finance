<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendapatanBank extends Model
{
    protected $table = 'pendapatan_bank';
    protected $fillable = ['id',
    'kode_pendapatan',
    'tanggal',
    'jenis_pendapatan',
    'jumlah_pendapatan',
    'keterangan',
    'bank',
    'divisi',
    ];
}
