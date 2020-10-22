<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PiutangLine extends Model
{
    protected $table = 'piutang_line';
    protected $fillable = ['id',
    'piutang',
    'barang',
    'harga',
    'qty',
    'grand_total',
    ];

    public function barangs(){
        return $this->belongsTo('App\Models\Barang','barang');
    }
}
