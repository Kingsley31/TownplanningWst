<?php

namespace App\SystemModels;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    //
    protected $fillable = [
        'zone_id','village_name','key',
    ];
}
