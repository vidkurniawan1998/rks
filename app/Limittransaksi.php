<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Limittransaksi extends Model
{
    //
    protected $table = 'limit_koperasi';
    protected $fillable = [
        'nama',
        'idstaff',
        'saldo',
        'last_update',
        'updated_at',
        'created_at',
        'deleted_at',
    ];
}
