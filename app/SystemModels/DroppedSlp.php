<?php

namespace App\SystemModels;

use Illuminate\Database\Eloquent\Model;

class DroppedSlp extends Model
{
    protected $fillable=[
        'app_id',
        'slp_id',
        'remark',
        'status',
        'app_stage','app_stage_status',
    ];
}
