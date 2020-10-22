<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Piutang extends Model
{
    protected $table = 'piutang';
    protected $fillable = ['id',
    'tanggal',
    'kode_piutang',
    'nama_customer_id',
    'sisa',
    'barang',
    ];

    public function lines(){
        return $this->hasMany('App\Models\PiutangLine','piutang');
     }

     public function riwayat(){
        return $this->hasMany('App\Models\HistoryPiutang','piutang');
     }
}
