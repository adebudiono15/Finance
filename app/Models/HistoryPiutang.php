<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryPiutang extends Model
{
    protected $table = 'history_piutang';
    protected $fillable = ['id',
    'piutang',    
    'kode_piutang',
    'total_pembayaran',
];
}
