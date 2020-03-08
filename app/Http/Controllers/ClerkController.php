<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\SystemModels\SuperZone;
use App\SystemModels\BpApplication;

class ClerkController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function showDashboard(){
        $user=Auth::user();

        return view("clerk.clerk-dashboard",['user'=>$user]);
        
    }


    public function showUserRegForm(){
        $user=Auth::user();
        return view("clerk.clerk-new-user-registration",['user'=>$user]);
    }

    public function showAppRegForm(){
        $user=Auth::user();
        $super_zones=SuperZone::all();
        return view("clerk.clerk-new-building-application-registration",['user'=>$user,'super_zones'=>$super_zones]);
    }


    public function showAppDocumentRegForm(){
        $user=Auth::user();
        $applications=BpApplication::where('app_stage',"REGISTERED")->where('app_stage_status',"AWAITING-DOCUMENTS-UPLOAD")->get();
        return view("clerk.clerk-new-building-application-document-upload",['user'=>$user,'applications'=>$applications]);
    }


}
