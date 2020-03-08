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

class TpoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showDashboard(){
        $user=Auth::user();

        return view("tpo.tpo_dashboard",['user'=>$user]);
        
    }


    public function showSlp(){
        $user=Auth::user();
        $tpo_staff=Staff::where('user_id',$user->id)->first();
        $applications=[];

        //GET SLPS ASSIGNED TO THIS TPO
        $applicationx=BpApplication::where('app_stage','SLP')->where('app_stage_status','AWAITING-ATPO-ASSIGNMENT')->get();
        foreach ($applicationx as $application) {
            $task=Task::where('app_id',$application->id)->where('staff_id',$tpo_staff->id)->first();
            if($task!=null){
                array_push($applications,$application);
            }
        }
        $this->loadBpApplicationsData($applications);
        $atpos=[];
        $atpos_staff=Staff::where('staff_role','ATPO')->where('department',$tpo_staff->department)->get();
        foreach ($atpos_staff as $atpo_staff) {
            $atpouser=User::where('id',$atpo_staff->user_id)->first();
            $atpo_staff->user= $atpouser;
            array_push($atpos,$atpo_staff);
        }
        return view("tpo.tpo_slp",['user'=>$user,'applications'=>$applications,'atpos'=>$atpos]);
        
    }


    public function showAssessment(){
        $user=Auth::user();
        $tpo_staff=Staff::where('user_id',$user->id)->first();
        $applications=[];
        $applicationx=BpApplication::where('app_stage','ASSESMENT')->where('app_stage_status','AWAITING-ASSESSMENT')->get();
        foreach ($applicationx as $application) {
            $task=Task::where('app_id',$application->id)->where('staff_id',$tpo_staff->id)->first();
            if($task!=null){
                array_push($applications,$application);
            }
        }
        $this->loadBpApplicationsData($applications);
        return view("tpo.tpo_assessment",['user'=>$user,'applications'=>$applications]);
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


    public function showPendingSirs(){
        $user=Auth::user();
        $sir_upload_tasks=$this->getTpoSirUploadTasks($user->id);
        $applications=$this->getAppsAwaitingSirUpload($sir_upload_tasks);
        $this->loadBpApplicationsData($applications);
        return view('tpo.tpo_pending_sir',['user'=>$user,'applications'=>$applications]);
    }

    public function getTpoSirUploadTasks($user_id){
        $tpo_staff=Staff::where('user_id',$user_id)->first();
        $sir_upload_tasks=Task::where('task_type','SIR-REPORT')->where('task_status','PENDING')->where('staff_id',$tpo_staff->id)->get();
        return $sir_upload_tasks;
    }

    public function getAppsAwaitingSirUpload($sir_upload_tasks){
        $applications=[];
        foreach ($sir_upload_tasks as $sir_upload_task) {
           $application=BpApplication::where('id',$sir_upload_task->app_id)->first();
           array_push($applications,$application);
        }

        return $applications;
    }



    public function showCompletedSirs(){
        $user=Auth::user();
        $completed_sir_upload_tasks=$this->getTpoCompletedSirUploadTasks($user->id);
        $applications=$this->getAppsAwaitingSirUpload($completed_sir_upload_tasks);
        $this->loadBpApplicationsData($applications);
        return view('tpo.tpo_completed_sir',['user'=>$user,'applications'=>$applications]);
    }

    public function getTpoCompletedSirUploadTasks($user_id){
        $tpo_staff=Staff::where('user_id',$user_id)->first();
        $sir_upload_tasks=Task::where('task_type','SIR-REPORT')->where('task_status','COMPLETED')->where('staff_id',$tpo_staff->id)->get();
        return $sir_upload_tasks;
    }

    public function showPendingPpis(){
        $user=Auth::user();
        $ppi_upload_tasks=$this->getTpoPpiUploadTasks($user->id);
        $applications=$this->getAppsAwaitingPpiUpload($ppi_upload_tasks);
        $this->loadBpApplicationsData($applications);
        return view('tpo.tpo_pending_ppi',['user'=>$user,'applications'=>$applications]);
    }

    public function getTpoPpiUploadTasks($user_id){
        $tpo_staff=Staff::where('user_id',$user_id)->first();
        $ppi_upload_tasks=Task::where('task_type','PPI-REPORT')->where('task_status','PENDING')->where('staff_id',$tpo_staff->id)->get();
        return $ppi_upload_tasks;
    }

    public function getAppsAwaitingPpiUpload($ppi_upload_tasks){
        $applications=[];
        foreach ($ppi_upload_tasks as $ppi_upload_task) {
           $application=BpApplication::where('id',$ppi_upload_task->app_id)->first();
           array_push($applications,$application);
        }

        return $applications;
    }

    public function showCompletedPpis(){
        $user=Auth::user();
        $completed_ppi_upload_tasks=$this->getTpoCompletedPpiUploadTasks($user->id);
        $applications=$this->getAppsAwaitingPpiUpload($completed_ppi_upload_tasks);
        $this->loadBpApplicationsData($applications);
        return view('tpo.tpo_completed_ppi',['user'=>$user,'applications'=>$applications]);
    }

    public function getTpoCompletedPpiUploadTasks($user_id){
        $tpo_staff=Staff::where('user_id',$user_id)->first();
        $ppi_upload_tasks=Task::where('task_type','PPI-REPORT')->where('task_status','COMPLETED')->where('staff_id',$tpo_staff->id)->get();
        return $ppi_upload_tasks;
    }


}
