<?php

namespace App\SystemModels;

use Illuminate\Database\Eloquent\Model;

class DroppedHealthReport extends Model
{
    protected $fillable=[
        'app_id',
        'health_report_id',
        'remark',
        'status',
        'app_stage','app_stage_status',
    ];
}
