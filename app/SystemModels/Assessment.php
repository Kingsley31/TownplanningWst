<?php

namespace App\SystemModels;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    //
    protected $fillable = [
        'app_id','staff_id','planning_rate',
        'inspection_rate','registration_fee',
        'charting_fee','fencing_fee',
        'stages_permit_fee','igr_fee',
        'penalty_fee','total',
        'approved','approved_by',
    ];
}
