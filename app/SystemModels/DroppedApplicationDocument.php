<?php

namespace App\SystemModels;

use Illuminate\Database\Eloquent\Model;

class DroppedApplicationDocument extends Model
{
    protected $fillable = [
        'app_id',
        'document_id','remark','status',
        'app_stage','app_stage_status',
    ];
}
