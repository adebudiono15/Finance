<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';
    protected $fillable = [
        'id',
        'kode_supplier',
        'nama_supplier',
        'alamat',
        'telepon',
        'email',
        'contact_person'
    ];
}
