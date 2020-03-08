<?php

namespace App\SystemModels;

use Illuminate\Database\Eloquent\Model;

class BpApplicationDocument extends Model
{
    //
    protected $fillable = [
        'bp_application_id','document_type_id','src',
    ];
}
