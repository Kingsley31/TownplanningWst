<?php

namespace App\SystemModels;

use Illuminate\Database\Eloquent\Model;

class DroppedSir extends Model
{
    protected $fillable=[
        'app_id',
        'sir_id',
        'remark',
        'status',
        'app_stage','app_stage_status',
    ];
}
