<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisPengeluaran extends Model
{
    protected $table = 'jenis_pengeluaran';
    protected $fillable = ['id','nama_jenis_pengeluaran'];
}
