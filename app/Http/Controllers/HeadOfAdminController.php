<?php

namespace App\Http\Controllers;
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

use Illuminate\Http\Request;

class HeadOfAdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function showDashboard(){
        $user=Auth::user();

        return view("headadmin.head-of-admin-dashboard",['user'=>$user]);
        
    }

    public function showSlp(){
        $user=Auth::user();
        $applications=[];
        $applications=BpApplication::where('app_stage','SLP')->where('app_stage_status','AWAITING-TPO-ASSIGMENT')->get();
        $this->loadBpApplicationsData($applications);
        $tpos=[];
        $staff_users=User::where('role','STAFF')->get();
        foreach ($staff_users as $staff_user) {
            $staff=Staff::where('user_id',$staff_user->id)->first();
            if($staff->staff_role==='TPO'){
                array_push($tpos,$staff_user);
            }
        }
        return view("headadmin.head-of-admin-slp",['user'=>$user,'applications'=>$applications,'tpos'=>$tpos]);
    }


    public function showIdpa(){
        $user=Auth::user();
        $applications=[];
        $applications=BpApplication::where('app_stage','IDPA')->where('app_stage_status','AWAITING-IDPA-DISPATCH')->get();
        $this->loadBpApplicationsData($applications);
        return view("headadmin.head-of-admin-idpa",['user'=>$user,'applications'=>$applications]);
    }

    public function showChecklist(){
        $user=Auth::user();
        $staff=Staff::where('user_id',$user->id)->first();
        $tasks=$this->getCheckListApprovalTasks($staff->id);
        $applications=$this->getChecklistApprovalApps($tasks);
        $this->loadBpApplicationsChecklistData($applications);
        return view("headadmin.head-of-admin-checklist",['user'=>$user,'applications'=>$applications]);
    }

    public function getCheckListApprovalTasks($staff_id){
        $tasks=Task::where('task_type','CHECKLIST-APPROVAL')->where('task_status','PENDING')->where('staff_id',$staff_id)->get();
        return $tasks;
    }

    public function getChecklistApprovalApps($tasks){
       $applications=[];
       foreach ($tasks as $task) {
          $application=BpApplication::where('id',$task->app_id)->first();
          if($application->app_stage_status==='AWAITING-CHECKLIST-APPROVAL'){
            array_push($applications,$application);
          }
          
       }

       return $applications;
    }

    public function loadBpApplicationsChecklistData($applications){
        if(count($applications)>0){
            foreach ($applications as $building_application) {
                $user=User::where('id',$building_application->developer_user_id)->first();
                $building_application->user=$user;
                $superzone=SuperZone::where('id',$building_application->super_zone)->first();
                $building_application->superzone=$superzone;
                $zone=Zone::where('id',$building_application->zone_id)->first();
                $building_application->zone=$zone;
                $village=Village::where('id',$building_application->village_id)->first();
                $building_application->village=$village;
                $sir=SirReport::where('app_id',$building_application->id)->first();
                $cer=EngrReport::where('app_id',$building_application->id)->first();
                $hor=HealthReport::where('app_id',$building_application->id)->first();
                $ppi=PpiReport::where('app_id',$building_application->id)->first();
                $task_clearance=BpApplicationDocument::where('bp_application_id',$building_application->id)->where('doc_type','TAX-CLEARANCE')->first();
                $site_analysis=BpApplicationDocument::where('bp_application_id',$building_application->id)->where('doc_type','SITE-ANALYSIS-REPORT')->first();
                $c_of_o=BpApplicationDocument::where('bp_application_id',$building_application->id)->where('doc_type','C-OF-O')->first();
                $site_plan=BpApplicationDocument::where('bp_application_id',$building_application->id)->where('doc_type','SITE-PLAN')->first();
                $capitation_rate=BpApplicationDocument::where('bp_application_id',$building_application->id)->where('doc_type','CAPITATION-RATE')->first();
               
            }


        }
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


    public function showAppdocuments($id){
        $user=Auth::user();
        $application=BpApplication::where('id',$id)->first();
        $documents=BpApplicationDocument::where('bp_application_id',$application->id)->get();
        foreach($documents as $document){
          $dropped_document=DroppedApplicationDocument::where('document_id',$document->id)->where('status','AWAITING-REUPLOAD')->first();
          if($dropped_document!=null){
            $document->dropped=1;
          }else{
            $document->dropped=0;
          }
        }
        $slp=Slp::where('app_id',$application->id)->first();
        $dropped_slp=DroppedSlp::where('slp_id',$slp->id)->where('status','AWAITING-REUPLOAD')->first();
        if($dropped_slp!=null){
            $slp->dropped=1;
        }else{
            $slp->dropped=0;
        }
        $sir=SirReport::where('app_id',$application->id)->first();
        $dropped_sir=DroppedSir::where('sir_id',$sir->id)->where('status','AWAITING-REUPLOAD')->first();
        if($dropped_sir!=null){
            $sir->dropped=1;
        }else{
            $sir->dropped=0;
        }

        if($application->app_building_height>1){
            $engr=EngrReport::where('app_id',$application->id)->first();
            $dropped_engr=DroppedEngrReport::where('engr_report_id',$engr->id)->where('status','AWAITING-REUPLOAD')->first();
            if($dropped_engr!=null){
                $engr->dropped=1;
            }else{
                $engr->dropped=0;
            }
        }
        
        $ppi=PpiReport::where('app_id',$application->id)->first();
        $dropped_ppi=DroppedPpiReport::where('ppi_report_id',$ppi->id)->where('status','AWAITING-REUPLOAD')->first();
        if($dropped_ppi!=null){
            $ppi->dropped=1;
        }else{
            $ppi->dropped=0; 
        }
        $hor=HealthReport::where('app_id',$application->id)->first();
        $dropped_hor=DroppedHealthReport::where('health_report_id',$hor->id)->where('status','AWAITING-REUPLOAD')->first();
        if($dropped_hor!=null){
            $hor->dropped=1;
        }else{
            $hor->dropped=0; 
        }

         if($application->app_building_height>1){
             return view('headadmin.head-of-admin-view-document',[
                'user'=>$user,
                'application'=>$application,
                'documents'=>$documents,
                'slp'=>$slp,
                'sir'=>$sir,
                'engr'=>$engr,
                'ppi'=>$ppi,
                'hor'=>$hor,
            ]);
         }else{
             return view('headadmin.head-of-admin-view-document',[
                'user'=>$user,
                'application'=>$application,
                'documents'=>$documents,
                'slp'=>$slp,
                'sir'=>$sir,
                'ppi'=>$ppi,
                'hor'=>$hor,
            ]);
         }
        
    }


    public function idpaDoc($id){
        $user=Auth::user();
        $application=BpApplication::where('id',$id)->first();
        $developer=User::where('id',$application->developer_user_id)->first();
        $application->developer=$developer;
        $es_staff=Staff::where('staff_role','ES')->where('status','ACTIVE')->first();
        $signature=Signature::where('user_id',$es_staff->user_id)->first();

        return view('headadmin.head-of-admin-view-idpa-print',[
            'user'=>$user,
            'application'=>$application,
            'signature'=> $signature,
        ]);
    }
}
