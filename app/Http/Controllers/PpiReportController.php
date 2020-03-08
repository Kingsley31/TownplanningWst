<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\SystemModels\BpApplication;
use Illuminate\Support\Facades\DB;
use App\SystemModels\SuperZone;
use App\SystemModels\Zone;
use App\SystemModels\Village;
use App\SystemModels\Task;
use App\SystemModels\Staff;
use App\SystemModels\HealthReport;
use App\SystemModels\EngrReport;
use App\SystemModels\PpiReport;
use App\SystemModels\SirReport;
use Illuminate\Support\Facades\Validator;
use App\User;

class PpiReportController extends Controller
{
    //

    public function uploadPpi(Request $request){
        $v=Validator::make($request->all(), [
            'ppi' => ['required', 'image', 'mimes:jpeg,png'],
            'comment' => ['required', 'string', 'min:1'],
            'appid' => ['required', 'numeric', 'min:1', 'exists:bp_applications,id'],
        ]);

        if ($v->fails()) {
            //
            return redirect()->back()->withErrors($v)->withInput();
        }

        $user=Auth::user();
        $tpo_staff=Staff::where('user_id',$user->id)->first();
        $application=BpApplication::where('id',$request->input('appid'))->first();

        if($application->app_building_height>1){
            if($this->checkIfCerIsSummitted($application->id)==true && $this->checkIfHorIsSubmitted($application->id)==true && $this->checkIfSirIsSummited($application->id) ==true){
                $application->app_stage="CHECKLIST";
                $application->app_stage_status="AWAITING-HOA-ASSIGNMENT";
                $application->save();
                $this->assignHoaAssignmentTaskToActiveEs($application->id);
            }
        }else{
            if($this->checkIfHorIsSubmitted($application->id)==true && $this->checkIfSirIsSummited($application->id) ==true){
                $application->app_stage="CHECKLIST";
                $application->app_stage_status="AWAITING-HOA-ASSIGNMENT";
                $application->save();
                $this->assignHoaAssignmentTaskToActiveEs($application->id);
            }
            
        }

        

        $comment=$request->input('comment');
        $ppi_image=$request->file('ppi');
        $image_path=$application->id."-PPI".'.'.$ppi_image->getClientOriginalExtension();
        $this->uploadPpiDoc($ppi_image,$image_path);
        $this->storePpi($application->id,$comment,$tpo_staff->id,$image_path);
        $this->updateTpoPpiReportTaskToCompleted($tpo_staff->id,$application->id);

        return redirect()->back()->with('message', 'PPI report uploaded successful');

    }

    public function checkIfSirIsSummited($app_id){
        $sir=SirReport::where('app_id',$app_id)->first();

        if($sir==null){
            return false;
        }

        return true;
    }

    public function checkIfHorIsSubmitted($app_id){
        $hor=HealthReport::where('app_id',$app_id)->first();

        if($hor==null){
            return false;
        }

        return true;
    }


    public function checkIfCerIsSummitted($app_id){
        $cer=EngrReport::where('app_id',$app_id)->first();

        if($cer==null){
            return false;
        }

        return true;
    }


    public function uploadPpiDoc($ppi_image,$image_path){
        $ppi_image->move(public_path('documents'),$image_path);
    }


    public function storePpi($app_id,$comment,$staff_id,$image_path){
        $ppi=new PpiReport;
        $ppi->app_id=$app_id;
        $ppi->recommended='YES';
        $ppi->comment=$comment;
        $ppi->src=$image_path;
        $ppi->staff_id=$staff_id;
        $ppi->save();
    }


    public function updateTpoPpiReportTaskToCompleted($staff_id,$app_id){
        $task=Task::where('staff_id',$staff_id)->where('task_type','PPI-REPORT')->where('task_status','PENDING')->where('app_id',$app_id)->first();
        $task->task_status='COMPLETED';
        $task->save();
    }


    public function assignHoaAssignmentTaskToActiveEs($app_id){
        $es_staff=Staff::where('staff_role','ES')->where('status','ACTIVE')->first();
        $es_task=new Task;
        $es_task->app_id=$app_id;
        $es_task->staff_id=$es_staff->id;
        $es_task->task_type='HOA-ASSIGNMENT';
        $es_task->task_status='PENDING';
        $es_task->assigned_date=now();
        $es_task->save();

    }
}
