<?php

namespace App\SystemModels;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //

    protected $fillable = [
        'staff_id','task_type','task_status',
        'assigned_date','completed_date',
        'app_id',
    ];
}
