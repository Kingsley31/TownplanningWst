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


class HacController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function showDashboard() {
        $user=Auth::user();

        
        return view('hac.head-of-account-dashboard',['user'=>$user]);
    }


    public function approvedassessments() {
        $user=Auth::user();
        $applications=[];
        $hacStaff=Staff::where('user_id',$user->id)->first();
        $assessmentTasks=Task::where('task_type','ACCOUNT-OFFICER-ASSIGNMENT')
        ->where('task_status','PENDING')->where('staff_id',$hacStaff->id)->get();
        foreach ($assessmentTasks as $assessmentTask) {
            $application=BpApplication::where('id',$assessmentTask->app_id)->first();
            array_push($applications,$application);
        }
        $this->loadBpApplicationsData($applications);

        $acos=[];
        $acos_staff=Staff::where('staff_role','ACO')->where('department',$hacStaff->department)->get();
        foreach ($acos_staff as $aco_staff) {
            $acouser=User::where('id',$aco_staff->user_id)->first();
            $aco_staff->user= $acouser;
            array_push($acos,$aco_staff);
        }
        
        return view('hac.approvedassessments',['user'=>$user,'applications'=>$applications,'acos'=>$acos]);
        

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
