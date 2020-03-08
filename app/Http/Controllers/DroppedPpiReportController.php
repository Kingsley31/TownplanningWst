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
use App\SystemModels\PpiReport;
use App\SystemModels\Task;
use App\SystemModels\Staff;

class DroppedPpiReportController extends Controller
{
    //

    public function dropPpi(Request $request){
        $v=Validator::make($request->all(), [
            'docid' => ['required', 'numeric', 'min:1', 'exists:ppi_reports,id'],
            'comment' => ['required', 'string', 'min:1'],
        ]);

        if ($v->fails()) {
            //
            return redirect()->back()->withErrors($v)->withInput();
        }

        $ppi=PpiReport::where('id',$request->input('docid'))->first();
        $application=BpApplication::where('id',$ppi->app_id)->first();
        $comment=$request->input('comment');

        if($this->checkIfSirHasBeenDroppedBefore($application->id)===true){
            $dropped_sir=DroppedSir::where('app_id',$application->id)->where('status','AWAITING-REUPLOAD')->first();
            $this->storeDroppedPpi($application->id,$ppi->id,$comment,$dropped_sir->app_stage,$dropped_sir->app_stage_status);
            $application->app_stage="DROPPED";
            $application->app_stage_status="AWAITING-DOCUMENT-REUPLOAD";
            $application->save();
            $this->assignPpiReUploadTasktoStaffThatUploadedIt($application);
            return redirect()->back()->with('message', 'PPI report dropped successfully');
        }


        if($this->checkIfSlpHasBeenDroppedBefore($application->id)===true){
            $dropped_slp=DroppedSlp::where('app_id',$application->id)->where('status','AWAITING-REUPLOAD')->first();
            $this->storeDroppedPpi($application->id,$ppi->id,$comment,$dropped_slp->app_stage,$dropped_slp->app_stage_status);
            $application->app_stage="DROPPED";
            $application->app_stage_status="AWAITING-DOCUMENT-REUPLOAD";
            $application->save();
            $this->assignPpiReUploadTasktoStaffThatUploadedIt($application);
            return redirect()->back()->with('message', 'PPI report dropped successfully');
        }

        if($this->checkIfEngrHasBeenDroppedBefore($application->id)===true){
            $dropped_engr=DroppedEngrReport::where('app_id',$application->id)->where('status','AWAITING-REUPLOAD')->first();
            $this->storeDroppedPpi($application->id,$ppi->id,$comment,$dropped_engr->app_stage,$dropped_engr->app_stage_status);
            $application->app_stage="DROPPED";
            $application->app_stage_status="AWAITING-DOCUMENT-REUPLOAD";
            $application->save();
            $this->assignPpiReUploadTasktoStaffThatUploadedIt($application);
            return redirect()->back()->with('message', 'PPI report dropped successfully');
        }


        if($this->checkIfHorHasBeenDroppedBefore($application->id)===true){
            $dropped_hor=DroppedHealthReport::where('app_id',$application->id)->where('status','AWAITING-REUPLOAD')->first();
            $this->storeDroppedPpi($application->id,$ppi->id,$comment,$dropped_hor->app_stage,$dropped_hor->app_stage_status);
            $application->app_stage="DROPPED";
            $application->app_stage_status="AWAITING-DOCUMENT-REUPLOAD";
            $application->save();
            $this->assignPpiReUploadTasktoStaffThatUploadedIt($application);
            return redirect()->back()->with('message', 'PPI report dropped successfully');
        }

        if($this->checkIfDocumentHasBeenDroppedBefore($application->id)===true){
            $dropped_app_doc=DroppedApplicationDocument::where('app_id',$application->id)->where('status','AWAITING-REUPLOAD')->first();
            $this->storeDroppedPpi($application->id,$ppi->id,$comment,$dropped_app_doc->app_stage,$dropped_app_doc->app_stage_status);
            $application->app_stage="DROPPED";
            $application->app_stage_status="AWAITING-DOCUMENT-REUPLOAD";
            $application->save();
            $this->assignPpiReUploadTasktoStaffThatUploadedIt($application);
            return redirect()->back()->with('message', 'PPI report dropped successfully');
        }


        $this->storeDroppedPpi($application->id,$ppi->id,$comment,$application->app_stage,$application->app_stage_status);
        $application->app_stage="DROPPED";
        $application->app_stage_status="AWAITING-DOCUMENT-REUPLOAD";
        $application->save();
        $this->assignPpiReUploadTasktoStaffThatUploadedIt($application);
        return redirect()->back()->with('message', 'PPI report dropped successfully');
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

    public function checkIfEngrHasBeenDroppedBefore($app_id){
        $dropped_engr=DroppedEngrReport::where('app_id',$app_id)->where('status','AWAITING-REUPLOAD')->first();
        if($dropped_engr!=null){
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


    public function storeDroppedPpi($app_id,$ppi_id,$remark,$app_stage,$app_stage_status){
        DroppedPpiReport::create([
            'app_id'=>$app_id,
            'ppi_report_id'=>$ppi_id,
            'remark'=>$remark,
            'status'=>'AWAITING-REUPLOAD',
            'app_stage'=>$app_stage,
            'app_stage_status'=>$app_stage_status,
        ]);
    }

    public function assignPpiReUploadTasktoStaffThatUploadedIt($application){
        $ppi_task=Task::where('task_type','PPI-REPORT')->where('task_status','COMPLETED')->where('app_id',$application->id)->first();

        $task=new Task;
        $task->staff_id=$ppi_task->staff_id;
        $task->app_id=$application->id;
        $task->assigned_date=now();
        $task->task_type="PPI-REPORT-REUPLOAD";
        $task->task_status="PENDING";
        $task->save();
    }
}
