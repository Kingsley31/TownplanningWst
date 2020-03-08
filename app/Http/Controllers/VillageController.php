<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SystemModels\Village;

class VillageController extends Controller
{
    //

    public function fileVillages($zone){
        $villages=Village::where('zone_id',$zone)->get();
        return $villages;
    }
}
