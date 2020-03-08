<?php

namespace App\SystemModels;

use Illuminate\Database\Eloquent\Model;

class NotRecommendedApplication extends Model
{
    //
    protected $fillable = [
        'app_id','staff_id','reason',
        'disapproval_date','stage',
        'stage_status','issue_status',
        'resolved_date','document_type',
    ];
}
