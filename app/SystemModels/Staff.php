<?php

namespace App\SystemModels;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //
    protected $fillable = [
        'user_id','staff_role','department','status',
    ];
}
