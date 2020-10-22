<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable = [
        'id',
        'kode_customer',
        'nama_customer',
        'alamat',
        'telepon',
        'email',
        'contact_person'
    ];
}

