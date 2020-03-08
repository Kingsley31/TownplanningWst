<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SystemModels\Zone;

class ZoneController extends Controller
{
    //


    public function fileZones($superzone){
        
        $zones=Zone::where('superzone_id',$superzone)->get();
        return response()->json($zones);
       
    }
}
