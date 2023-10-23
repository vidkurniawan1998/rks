<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datalimit extends Model
{
    //

    protected $table = 'data_limit_2';
    protected $fillable = [
        'nama',
        'idstaff',
        'saldo',
        'last_update',
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    // protected $table = 'data_limit';
    // protected $fillable = [
    //     'file',
    //     'updated_at',
    //     'created_at',
    // ];
}
