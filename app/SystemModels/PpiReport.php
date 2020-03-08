<?php

namespace App\SystemModels;

use Illuminate\Database\Eloquent\Model;

class PpiReport extends Model
{
    //
    protected $fillable = [
        'app_id','recommended','comment',
        'src','staff_id',
    ];
}
