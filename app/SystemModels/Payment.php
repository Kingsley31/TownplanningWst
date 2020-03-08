<?php

namespace App\SystemModels;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = [
        'app_id','amount_paid','supposed_amount',
        'payment_status','es_approval',
        'es_comment','receipt_src','payment_mode'
    ];
}
