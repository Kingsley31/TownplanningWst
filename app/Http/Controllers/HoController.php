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
use App\User;

class HoController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showDashboard(){
        $user=Auth::user();

        return view("ho.ho_dashboard",['user'=>$user]);
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


    public function showPendingHors(){
        $user=Auth::user();

        $ho_staff=Staff::where('user_id',$user->id)->first();
        $applications=[];

        $ho_tasks=Task::where('staff_id',$ho_staff->id)->where('task_type','HR-REPORT')->where('task_status','PENDING')->get();
        foreach ($ho_tasks as $ho_task) {
            $application=BpApplication::where('id',$ho_task->app_id)->first();
            array_push($applications,$application);
        }
        $this->loadBpApplicationsData($applications);

        return view('ho.ho_pending_hors',['user'=>$user,'applications'=>$applications]);
    }

    public function showCompletedHors(){
        $user=Auth::user();

        $ho_staff=Staff::where('user_id',$user->id)->first();
        $applications=[];

        $ho_tasks=Task::where('staff_id',$ho_staff->id)->where('task_type','HR-REPORT')->where('task_status','COMPLETED')->get();
        foreach ($ho_tasks as $ho_task) {
            $application=BpApplication::where('id',$ho_task->app_id)->first();
            array_push($applications,$application);
        }
        $this->loadBpApplicationsData($applications);

        return view('ho.ho_completed_hors',['user'=>$user,'applications'=>$applications]);
    }
}
