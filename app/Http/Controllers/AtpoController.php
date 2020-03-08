<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\SystemModels\SuperZone;
use App\SystemModels\BpApplication;
use App\SystemModels\Staff;
use App\SystemModels\Zone;
use App\SystemModels\Village;
use App\SystemModels\Task;
use App\User;


class AtpoController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showDashboard(){
        $user=Auth::user();

        return view("atpo.atpo_dashboard",['user'=>$user]);
        
    }


    public function showSlp(){
        $user=Auth::user();
        $tpo_staff=Staff::where('user_id',$user->id)->first();
        $applications=[];

        //GET SLPS ASSIGNED TO THIS TPO
        $applicationx=BpApplication::where('app_stage','SLP')->where('app_stage_status','AWAITING-SLP-UPLOAD')->get();
        foreach ($applicationx as $application) {
            $task=Task::where('app_id',$application->id)->where('staff_id',$tpo_staff->id)->first();
            if($task!=null){
                array_push($applications,$application);
            }
        }
        $this->loadBpApplicationsData($applications);
       
        return view("atpo.atpo_slp",['user'=>$user,'applications'=>$applications]);
        
    }


    public function loadBpApplicationsData($building_applications){
        
        if(count($building_applications)>0){
            foreach ($building_applications as $building_application) {
                $user=User::where('id',$building_application->developer_user_id)->first();
                $building_application->user=$user;
                $superzone=SuperZone::where('id',$building_application->super_zone)->first();
                $building_application->superzone=$superzone;
                $zone=Zone::where('id',$building_application->zone_id)->first();
                $building_application->zone=$zone;
                $village=Village::where('id',$building_application->village_id)->first();
                $building_application->village=$village;
            }


        }

    }
}
