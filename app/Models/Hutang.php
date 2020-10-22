<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hutang extends Model
{
    protected $table = 'hutang';
    protected $fillable = ['id',
    'tanggal',
    'kode_hutang',
    'nama_customer_id',
    'sisa',
    'barang',
    ];

    public function lines(){
        return $this->hasMany('App\Models\HutangLine','hutang');
     }

     public function riwayat(){
        return $this->hasMany('App\Models\HistoryHutang','hutang');
     }
}
