<?php

namespace App\SystemModels;

use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    protected $fillable=[
        'user_id',
        'signature_path',
        'password'
    ];
}
