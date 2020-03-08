<?php

namespace App\SystemModels;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    //
    protected $fillable = [
        'superzone_id','zone_name','zone_key',
    ];
}
