<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'voucher';
    protected $fillable = [
        'vtype',
        'harga1',
        'harga2',
        'harga3',
        'harga4',
        'harga5',
        'harga6',
        'harga7',
        'harga8',
        'harga9',
        'jenis',
        'opr',
        'status',
        'ket',
        'detail',
        'gangguan',
        'prefix',
        'kode_nom',
        'cluster',
    ];
}
