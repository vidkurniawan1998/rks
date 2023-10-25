<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logpurchase extends Model
{
    //
    protected $table='log_purchase';
    protected $fillable = [
        'trxid',
        'tanggal',
        'tglsukses',
        'agenid',
        'sender',
        'vtype',
        'sent',
        'status',
        'harga',
        'refund',
        'hpp',
        'supp_id',
        'tujuan',
        'receiver',
        'vsn',
        'opr',
        'partner_trxid',
        'iskirim',
        'h2h_id',
        'h2h_partner_trxid',
        'h2h_reversaled',
        'cnt',
        'enduser',
        'response',
    ];
}
