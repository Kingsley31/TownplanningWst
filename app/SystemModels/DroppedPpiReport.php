<?php

namespace App\SystemModels;

use Illuminate\Database\Eloquent\Model;

class DroppedPpiReport extends Model
{
    protected $fillable=[
        'app_id',
        'ppi_report_id',
        'remark',
        'status',
        'app_stage','app_stage_status',
    ];
}
