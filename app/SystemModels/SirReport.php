<?php

namespace App\SystemModels;

use Illuminate\Database\Eloquent\Model;

class SirReport extends Model
{
    //
    protected $fillable = [
        'app_id','recommended','comment',
        'src','staff_id',
    ];
}
