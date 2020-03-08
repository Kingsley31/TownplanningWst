<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SystemModels\DroppedSir;
use App\SystemModels\DroppedSlp;
use App\SystemModels\DroppedPpiReport;
use App\SystemModels\DroppedHealthReport;
use App\SystemModels\DroppedEngrReport;
use App\SystemModels\DroppedApplicationDocument;
use App\SystemModels\BpApplicationDocument;
use App\SystemModels\BpApplication;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\SystemModels\EngrReport;
use App\SystemModels\Task;
use App\SystemModels\Staff;

class DroppedEngrReportController extends Controller
{
    

    public function dropEngr(Request $request){
        $v=Validator::make($request->all(), [
            'docid' => ['required', 'numeric', 'min:1', 'exists:engr_reports,id'],
            'comment' => ['required', 'string', 'min:1'],
        ]);

        if ($v->fails()) {
            //
            return redirect()->back()->withErrors($v)->withInput();
        }

        $engr=EngrReport::where('id',$request->input('docid'))->first();
        $application=BpApplication::where('id',$engr->app_id)->first();
        $comment=$request->input('comment');

        if($this->checkIfSirHasBeenDroppedBefore($application->id)===true){
            $dropped_sir=DroppedSir::where('app_id',$application->id)->where('status','AWAITING-REUPLOAD')->first();
            $this->storeDroppedEngr($application->id,$engr->id,$comment,$dropped_sir->app_stage,$dropped_sir->app_stage_status);
            $application->app_stage="DROPPED";
            $application->app_stage_status="AWAITING-DOCUMENT-REUPLOAD";
            $application->save();
            $this->assignEngrReUploadTasktoStaffThatUploadedIt($application);
            return redirect()->back()->with('message', 'Engineer report dropped successfully');
        }


        if($this->checkIfSlpHasBeenDroppedBefore($application->id)===true){
            $dropped_slp=DroppedSlp::where('app_id',$application->id)->where('status','AWAITING-REUPLOAD')->first();
            $this->storeDroppedEngr($application->id,$engr->id,$comment,$dropped_slp->app_stage,$dropped_slp->app_stage_status);
            $application->app_stage="DROPPED";
            $application->app_stage_status="AWAITING-DOCUMENT-REUPLOAD";
            $application->save();
            $this->assignEngrReUploadTasktoStaffThatUploadedIt($application);
            return redirect()->back()->with('message', 'Engineer report dropped successfully');
        }

        if($this->checkIfPpiHasBeenDroppedBefore($application->id)===true){
            $dropped_ppi=DroppedPpiReport::where('app_id',$application->id)->where('status','AWAITING-REUPLOAD')->first();
            $this->storeDroppedEngr($application->id,$engr->id,$comment,$dropped_ppi->app_stage,$dropped_ppi->app_stage_status);
            $application->app_stage="DROPPED";
            $application->app_stage_status="AWAITING-DOCUMENT-REUPLOAD";
            $application->save();
            $this->assignEngrReUploadTasktoStaffThatUploadedIt($application);
            return redirect()->back()->with('message', 'Engineer report dropped successfully');
        }


        if($this->checkIfHorHasBeenDroppedBefore($application->id)===true){
            $dropped_hor=DroppedHealthReport::where('app_id',$application->id)->where('status','AWAITING-REUPLOAD')->first();
            $this->storeDroppedEngr($application->id,$engr->id,$comment,$dropped_hor->app_stage,$dropped_hor->app_stage_status);
            $application->app_stage="DROPPED";
            $application->app_stage_status="AWAITING-DOCUMENT-REUPLOAD";
            $application->save();
            $this->assignEngrReUploadTasktoStaffThatUploadedIt($application);
            return redirect()->back()->with('message', 'Engineer report dropped successfully');
        }


        if($this->checkIfDocumentHasBeenDroppedBefore($application->id)===true){
            $dropped_app_doc=DroppedApplicationDocument::where('app_id',$application->id)->where('status','AWAITING-REUPLOAD')->first();
            $this->storeDroppedEngr($application->id,$engr->id,$comment,$dropped_app_doc->app_stage,$dropped_app_doc->app_stage_status);
            $application->app_stage="DROPPED";
            $application->app_stage_status="AWAITING-DOCUMENT-REUPLOAD";
            $application->save();
            $this->assignEngrReUploadTasktoStaffThatUploadedIt($application);
            return redirect()->back()->with('message', 'Engineer report dropped successfully');
        }


        $this->storeDroppedEngr($application->id,$engr->id,$comment,$application->app_stage,$application->app_stage_status);
        $application->app_stage="DROPPED";
        $application->app_stage_status="AWAITING-DOCUMENT-REUPLOAD";
        $application->save();
        $this->assignEngrReUploadTasktoStaffThatUploadedIt($application);
        return redirect()->back()->with('message', 'Engineer report dropped successfully');
    }

    public function checkIfSirHasBeenDroppedBefore($app_id){
        $dropped_sir=DroppedSir::where('app_id',$app_id)->where('status','AWAITING-REUPLOAD')->first();
        if($dropped_sir!=null){
            return true;
        }

        return false;
    }

    public function checkIfSlpHasBeenDroppedBefore($app_id){
        $dropped_slp=DroppedSlp::where('app_id',$app_id)->where('status','AWAITING-REUPLOAD')->first();
        if($dropped_slp!=null){
            return true;
        }

        return false;
    }

    public function checkIfPpiHasBeenDroppedBefore($app_id){
        $dropped_ppi=DroppedPpiReport::where('app_id',$app_id)->where('status','AWAITING-REUPLOAD')->first();
        if($dropped_ppi!=null){
            return true;
        }

        return false;
    }

    
    public function checkIfHorHasBeenDroppedBefore($app_id){
        $dropped_hor=DroppedHealthReport::where('app_id',$app_id)->where('status','AWAITING-REUPLOAD')->first();
        if($dropped_hor!=null){
            return true;
        }

        return false;
    }

    public function checkIfDocumentHasBeenDroppedBefore($app_id){
        $dropped_app_doc=DroppedApplicationDocument::where('app_id',$app_id)->where('status','AWAITING-REUPLOAD')->first();
        if($dropped_app_doc!=null){
            return true;
        }

        return false;
    }


    public function storeDroppedEngr($app_id,$engr_id,$remark,$app_stage,$app_stage_status){
        DroppedEngrReport::create([
            'app_id'=>$app_id,
            'engr_report_id'=>$engr_id,
            'remark'=>$remark,
            'status'=>'AWAITING-REUPLOAD',
            'app_stage'=>$app_stage,
            'app_stage_status'=>$app_stage_status,
        ]);
    }

    public function assignEngrReUploadTasktoStaffThatUploadedIt($application){
        $engr_task=Task::where('task_type','ER-REPORT')->where('task_status','COMPLETED')->where('app_id',$application->id)->first();

        $task=new Task;
        $task->staff_id=$engr_task->staff_id;
        $task->app_id=$application->id;
        $task->assigned_date=now();
        $task->task_type="ER-REPORT-REUPLOAD";
        $task->task_status="PENDING";
        $task->save();
    }
}
