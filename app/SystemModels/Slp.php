<?php

namespace App\SystemModels;

use Illuminate\Database\Eloquent\Model;

class Slp extends Model
{
    //
    protected $fillable = [
        'app_id','description','src',
        'staff_id',
    ];
}
