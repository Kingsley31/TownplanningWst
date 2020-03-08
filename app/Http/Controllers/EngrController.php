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


class EngrController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showDashboard(){
        $user=Auth::user();
        return view('engr.engr_dashboard',['user'=>$user]);
    }


    public function showPendingEr(){
        $user=Auth::user();
        $er_upload_tasks=$this->getEngrErUploadTasks($user->id);
        $applications=$this->getAppsAwaitingErUpload($er_upload_tasks);
        $this->loadBpApplicationsData($applications);
        return view('engr.engr_pending_ers',['user'=>$user,'applications'=>$applications]);
    }

    public function getEngrErUploadTasks($user_id){
        $engr_staff=Staff::where('user_id',$user_id)->first();
        $er_upload_tasks=Task::where('task_type','ER-REPORT')->where('task_status','PENDING')->where('staff_id',$engr_staff->id)->get();
        return $er_upload_tasks;
    }

    public function getAppsAwaitingErUpload($er_upload_tasks){
        $applications=[];
        foreach ($er_upload_tasks as $er_upload_task) {
           $application=BpApplication::where('id',$er_upload_task->app_id)->first();
           array_push($applications,$application);
        }

        return $applications;
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


    public function showCompletedEr(){
        $user=Auth::user();
        $completed_er_upload_tasks=$this->getEngrCompletedErUploadTasks($user->id);
        $applications=$this->getAppsAwaitingErUpload($completed_er_upload_tasks);
        $this->loadBpApplicationsData($applications);
        return view('engr.engr_completed_ers',['user'=>$user,'applications'=>$applications]);
    }


    public function getEngrCompletedErUploadTasks($user_id){
        $engr_staff=Staff::where('user_id',$user_id)->first();
        $er_upload_tasks=Task::where('task_type','ER-REPORT')->where('task_status','COMPLETED')->where('staff_id',$engr_staff->id)->get();
        return $er_upload_tasks;
    }
}
