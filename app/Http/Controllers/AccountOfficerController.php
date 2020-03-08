<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\SystemModels\SuperZone;
use App\SystemModels\BpApplication;
use App\SystemModels\Staff;
use App\SystemModels\Zone;
use App\SystemModels\Village;
use App\SystemModels\Task;
use App\SystemModels\Assessment;
use App\User;


class AccountOfficerController extends Controller
{
    public function dashboard() {
        $user=Auth::user();        
        return view('accountofficer.account-officer-dashboard',['user'=>$user]);
    }


    public function awaitingpaymentconfirmation() {        
        $user=Auth::user();
        $aco_staff=Staff::where('user_id',$user->id)->first();
        $applications=[];

        //GET SLPS ASSIGNED TO THIS TPO
        $applicationx=BpApplication::where('app_stage','PAYMENT')->where('app_stage_status','AWAITING-PAYMENT-CONFIRMATION')->get();
        foreach ($applicationx as $application) {
            $task=Task::where('app_id',$application->id)->where('staff_id',$aco_staff->id)->first();
            if($task!=null){
                array_push($applications,$application);
            }
        }
        $this->loadBpApplicationsData($applications);
        return view('accountofficer.awaitingpaymentconfirmation',['user'=>$user,'applications'=>$applications]);       

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
                $assessment=Assessment::where('app_id',$building_application->id)->first();
                $building_application->assessment=$assessment;

            }


        }

    }
}
