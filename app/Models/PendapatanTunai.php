<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendapatanTunai extends Model
{
    protected $table = 'pendapatan_tunai';
    protected $fillable = ['id',
    'kode_pendapatan',
    'tanggal',
    'jenis_pendapatan',
    'jumlah_pendapatan',
    'keterangan',
    'divisi',
    ];
}
