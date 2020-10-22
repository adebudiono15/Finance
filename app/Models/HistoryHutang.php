<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryHutang extends Model
{
    protected $table = 'history_hutang';
    protected $fillable = ['id',
    'hutang',    
    'kode_hutang',
    'total_pembayaran',
];
}
