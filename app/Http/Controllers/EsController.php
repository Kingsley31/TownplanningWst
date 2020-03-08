<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\SystemModels\SuperZone;
use App\SystemModels\BpApplication;
use App\SystemModels\Staff;
use App\SystemModels\Zone;
use App\SystemModels\Village;
use App\SystemModels\Task;
use App\SystemModels\Assessment;
use App\SystemModels\EngrReport;
use App\SystemModels\PpiReport;
use App\SystemModels\SirReport;
use App\SystemModels\HealthReport;
use App\User;
use App\SystemModels\Signature;
use Illuminate\Http\Request;

class EsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function showDashboard(){
        $user=Auth::user();
        $pendingAssessment=$this->getEsPendingAssessment($user);
        $pendingreports=$this->getEsPendingReports($user);
        $pendingchecklists=$this->getEsPendingChecklists($user);
        $pendingidpa=$this->getEsPendingIdpa($user);
        return view('es.es_dashboard',['user'=>$user,'pendingassessments'=>$pendingAssessment,'pendingreports'=>$pendingreports,'pendingchecklists'=>$pendingchecklists,'pendingidpa'=>$pendingidpa]);
    }

    public function getEsPendingAssessment($user){
        $esStaff=Staff::where('user_id',$user->id)->first();
        $assessmentTasks=Task::where('task_type','ASSESSMENT-APPROVAL')
        ->where('task_status','PENDING')->where('staff_id',$esStaff->id)->count();
        return $assessmentTasks;
    }

    public function getEsPendingReports($user){
        $esStaff=Staff::where('user_id',$user->id)->first();
        $assessmentTasks=Task::where('task_type','REPORTS-ASSIGNMENT')
        ->where('task_status','PENDING')->where('staff_id',$esStaff->id)->count();
        return $assessmentTasks;
    }

    public function getEsPendingChecklists($user){
        $esStaff=Staff::where('user_id',$user->id)->first();
        $assessmentTasks=Task::where('task_type','HOA-ASSIGNMENT')
        ->where('task_status','PENDING')->where('staff_id',$esStaff->id)->count();
        return $assessmentTasks;
    }

    public function getEsPendingIdpa($user){
        $esStaff=Staff::where('user_id',$user->id)->first();
        $assessmentTasks=Task::where('task_type','IDPA-SIGNING')
        ->where('task_status','PENDING')->where('staff_id',$esStaff->id)->count();
        return $assessmentTasks;
    }

    public function showSearchApps(){
        $user=Auth::user();
        return view('es.es_search_apps',['user'=>$user]);
    }

    public function showPendingAssessment(){
        $user=Auth::user();
        $applications=[];
        $esStaff=Staff::where('user_id',$user->id)->first();
        $assessmentTasks=Task::where('task_type','ASSESSMENT-APPROVAL')
        ->where('task_status','PENDING')->where('staff_id',$esStaff->id)->get();
        foreach ($assessmentTasks as $assessmentTask) {
            $application=BpApplication::where('id',$assessmentTask->app_id)->first();
            array_push($applications,$application);
        }
        $this->loadBpApplicationsData($applications);
        return view('es.es_pending_assessment',['user'=>$user,'applications'=>$applications]);
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

    public function showCompletedAssessments(){
        $user=Auth::user();
        $applications=[];
        $esStaff=Staff::where('user_id',$user->id)->first();
        $assessmentTasks=Task::where('task_type','ASSESSMENT-APPROVAL')
        ->where('task_status','COMPLETED')->where('staff_id',$esStaff->id)->get();
        foreach ($assessmentTasks as $assessmentTask) {
            $application=BpApplication::where('id',$assessmentTask->app_id)->first();
            array_push($applications,$application);
        }
        $this->loadBpApplicationsData($applications);
        return view('es.es_completed_assessment',['user'=>$user,'applications'=>$applications]);
    }


    public function showPendingReportsAssignment(){
        $user=Auth::user();
        $applications=[];
        $esStaff=Staff::where('user_id',$user->id)->first();
        $reportsTasks=Task::where('task_type','REPORTS-ASSIGNMENT')
        ->where('task_status','PENDING')->where('staff_id',$esStaff->id)->get();
        foreach ($reportsTasks as $reportsTask) {
            $application=BpApplication::where('id',$reportsTask->app_id)->first();
            array_push($applications,$application);
        }
        $this->loadBpApplicationsData($applications);
        $tpos=$this->getActiveTpos();
        $hos=$this->getActiveHos();
        $engs=$this->getActiveEngineers();
        
        return view('es.es_reports_pending_assignment',['user'=>$user,'applications'=>$applications,'tpos'=>$tpos,'hos'=>$hos,'engs'=>$engs]);
    }

    private function getActiveTpos(){
       $tpos=Staff::where('staff_role','TPO')->where('status','ACTIVE')->get();
       foreach ($tpos as $tpo) {
           $user=User::where('id',$tpo->user_id)->first();
           $tpo->user=$user;
       }
       return $tpos;
    }

    private function getActiveHos(){
        $hos=Staff::where('staff_role','HO')->where('status','ACTIVE')->get();
       foreach ($hos as $ho) {
           $user=User::where('id',$ho->user_id)->first();
           $ho->user=$user;
       }
       return $hos;
    }

    private function getActiveEngineers(){
        $engs=Staff::where('staff_role','ENG')->where('status','ACTIVE')->get();
        foreach ($engs as $eng) {
            $user=User::where('id',$eng->user_id)->first();
            $eng->user=$user;
        }
        return $engs;
    }


    public function showAssignedReports(){
        $user=Auth::user();
        $es_staff=Staff::where('user_id',$user->id)->first();

        $es_tasks=Task::where('staff_id',$es_staff->id)->where('task_type','REPORTS-ASSIGNMENT')->where('task_status','COMPLETED')->get();

        $applications=[];
        foreach ($es_tasks as $es_task) {
            $application=BpApplication::where('id',$es_task->app_id)->first();
            if($application->app_stage==='REPORT'){
                array_push($applications,$application);
            }
            
        }
        $this->loadBpApplicationsReportsData($applications);

        return view('es.es_assigned_reports',['user'=>$user,'applications'=>$applications]);

    }

    public function loadBpApplicationsReportsData($building_applications){
        
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
                $building_application->sir=$this->checkIfSirIsSummited($building_application->id);
                $building_application->hor=$this->checkIfHorIsSubmitted($building_application->id);
                $building_application->ppi=$this->checkIfPpiIsSubmitted($building_application->id);
                if($building_application->app_building_height>1){
                    $building_application->cer=$this->checkIfCerIsSummitted($building_application->id);
                }else{
                    $building_application->cer="not required";
                }
                
            }


        }

    }

    public function checkIfSirIsSummited($app_id){
        $sir=SirReport::where('app_id',$app_id)->first();

        if($sir==null){
            return "awaiting report";
        }

        return "submitted";
    }

    public function checkIfCerIsSummitted($app_id){
        $cer=EngrReport::where('app_id',$app_id)->first();

        if($cer==null){
            return "awaiting report";
        }

        return "submitted";
    }

    public function checkIfPpiIsSubmitted($app_id){
        $ppi=PpiReport::where('app_id',$app_id)->first();

        if($ppi==null){
            return "awaiting report";
        }

        return "submitted";
    }

    public function checkIfHorIsSubmitted($app_id){
        $hor=HealthReport::where('app_id',$app_id)->first();

        if($hor==null){
            return "awaiting report";
        }

        return "submitted";
    }


    public function showSubmittedReports(){
        $user=Auth::user();
        $es_staff=Staff::where('user_id',$user->id)->first();

        $es_tasks=Task::where('staff_id',$es_staff->id)->where('task_type','HOA-ASSIGNMENT')->where('task_status','PENDING')->get();

        $applications=[];
        foreach ($es_tasks as $es_task) {
            $application=BpApplication::where('id',$es_task->app_id)->first();
            array_push($applications,$application);
            
            
        }
        $this->loadBpApplicationsReportsData($applications);

        return view('es.es_submitted_reports',['user'=>$user,'applications'=>$applications]);
    }


    public function showEsIdpaAwaitingSignatory(){
        $user=Auth::user();
        $es_staff=Staff::where('user_id',$user->id)->first();

        $es_tasks=Task::where('staff_id',$es_staff->id)->where('task_type','IDPA-SIGNING')->where('task_status','PENDING')->get();

        $applications=[];
        foreach ($es_tasks as $es_task) {
            $application=BpApplication::where('id',$es_task->app_id)->first();
            array_push($applications,$application);
            
            
        }
        $this->loadBpApplicationsReportsData($applications);

        return view('es.es_idpa_waiting_signing',['user'=>$user,'applications'=>$applications]);
    }

    public function viewIdpa($id){
        $user=Auth::user();
        $application=BpApplication::where('id',$id)->first();
        $developer=User::where('id',$application->developer_user_id)->first();
        $application->developer=$developer;
        $es_staff=Staff::where('staff_role','ES')->where('status','ACTIVE')->first();
        $signature=Signature::where('user_id',$es_staff->user_id)->first();

        return view('es.es-view-idpa-print',[
            'user'=>$user,
            'application'=>$application,
            'signature'=> $signature,
        ]);
    }
}
