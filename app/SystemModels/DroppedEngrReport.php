<?php

namespace App\SystemModels;

use Illuminate\Database\Eloquent\Model;

class DroppedEngrReport extends Model
{
    protected $fillable=[
        'app_id',
        'engr_report_id',
        'remark',
        'status',
        'app_stage',
        'app_stage_status',
    ];
}
