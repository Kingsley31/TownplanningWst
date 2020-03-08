<?php

namespace App\SystemModels;

use Illuminate\Database\Eloquent\Model;

class IdpaDocument extends Model
{
    //
    protected $fillable = [
        'app_id','signed','comment',
        'src','signatory_staff_id',
        'staff_id','date_signed',
        'signature_src',
    ];
}
