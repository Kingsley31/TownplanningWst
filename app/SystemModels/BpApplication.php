<?php

namespace App\SystemModels;

use Illuminate\Database\Eloquent\Model;

class BpApplication extends Model
{
    //
    protected $fillable = [
        'developer_user_id','application_number','super_zone',
        'zone_id','village_id','file_no','app_stage',
        'app_stage_status','app_building_height','building_type',
    ];
}
