<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HutangLine extends Model
{
    protected $table = 'hutang_line';
    protected $fillable = ['id',
    'hutang',
    'barang',
    'harga',
    'qty',
    'grand_total',
    ];

    public function barangs(){
        return $this->belongsTo('App\Models\Barang','barang');
    }
}
