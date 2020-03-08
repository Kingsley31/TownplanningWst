<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\SystemModels\SuperZone;
use App\SystemModels\BpApplication;
use App\SystemModels\Staff;
use App\SystemModels\Zone;
use App\SystemModels\Village;
use App\SystemModels\HealthReport;
use App\SystemModels\EngrReport;
use App\SystemModels\PpiReport;
use App\SystemModels\SirReport;
use App\SystemModels\BpApplicationDocument;
use App\SystemModels\Task;
use App\SystemModels\Slp;
use App\User;
use App\SystemModels\DroppedSir;
use App\SystemModels\DroppedSlp;
use App\SystemModels\DroppedPpiReport;
use App\SystemModels\DroppedHealthReport;
use App\SystemModels\DroppedEngrReport;
use App\SystemModels\DroppedApplicationDocument;
use App\SystemModels\Signature;

class HeadIctController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showDashboard(){
        $user=Auth::user();

        return view("hict.head-ict-dashboard",['user'=>$user]);
    }

    public function showStaffReg(){
        $user=Auth::user();

        return view("hict.head-ict-staff-reg",['user'=>$user]);
    } 
}
