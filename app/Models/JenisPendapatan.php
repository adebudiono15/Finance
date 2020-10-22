<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisPendapatan extends Model
{
    protected $table = 'jenis_pendapatan';
    protected $fillable = ['id','nama_jenis_pendapatan'];
}
