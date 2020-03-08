<?php

namespace App\SystemModels;

use Illuminate\Database\Eloquent\Model;

class ModifiedAssessment extends Model
{
    //

    protected $fillable = [
        'assessment_id','app_id','staff_id','planning_rate',
        'inspection_rate','registration_fee',
        'charting_fee','fencing_fee',
        'stages_permit_fee','igr_fee',
        'penalty_fee','total',
        'modified_by',
    ];
}
