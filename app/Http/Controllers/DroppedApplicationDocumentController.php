<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SystemModels\DroppedSir;
use App\SystemModels\DroppedSlp;
use App\SystemModels\DroppedPpiReport;
use App\SystemModels\DroppedHealthReport;
use App\SystemModels\DroppedEngrReport;
use App\SystemModels\DroppedApplicationDocument;
use App\SystemModels\BpApplication;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\SystemModels\BpApplicationDocument;
use App\SystemModels\Task;
use App\SystemModels\Staff;

class DroppedApplicationDocumentController extends Controller
{
    
    public function dropDocument(Request $request){
        $v=Validator::make($request->all(), [
            'docid' => ['required', 'numeric', 'min:1', 'exists:bp_application_documents,id'],
            'comment' => ['required', 'string', 'min:1'],
        ]);

        if ($v->fails()) {
            //
            return redirect()->back()->withErrors($v)->withInput();
        }

        $document=BpApplicationDocument::where('id',$request->input('docid'))->first();
        $application=BpApplication::where('id',$document->bp_application_id)->first();
        $comment=$request->input('comment');


        if($this->checkIfSirHasBeenDroppedBefore($application->id)===true){
            $dropped_sir=DroppedSir::where('app_id',$application->id)->where('status','AWAITING-REUPLOAD')->first();
            $this->storeDroppedDoc($application->id,$document->id,$comment,$dropped_sir->app_stage,$dropped_sir->app_stage_status);
            $application->app_stage="DROPPED";
            $application->app_stage_status="AWAITING-DOCUMENT-REUPLOAD";
            $application->save();
            return redirect()->back()->with('message', 'Document dropped successfully');
        }


        if($this->checkIfSlpHasBeenDroppedBefore($application->id)===true){
            $dropped_slp=DroppedSlp::where('app_id',$application->id)->where('status','AWAITING-REUPLOAD')->first();
            $this->storeDroppedDoc($application->id,$document->id,$comment,$dropped_slp->app_stage,$dropped_slp->app_stage_status);
            $application->app_stage="DROPPED";
            $application->app_stage_status="AWAITING-DOCUMENT-REUPLOAD";
            $application->save();
            return redirect()->back()->with('message', 'Document dropped successfully');
        }


        if($this->checkIfEngrHasBeenDroppedBefore($application->id)===true){
            $dropped_engr=DroppedEngrReport::where('app_id',$application->id)->where('status','AWAITING-REUPLOAD')->first();
            $this->storeDroppedDoc($application->id,$document->id,$comment,$dropped_engr->app_stage,$dropped_engr->app_stage_status);
            $application->app_stage="DROPPED";
            $application->app_stage_status="AWAITING-DOCUMENT-REUPLOAD";
            $application->save();
            return redirect()->back()->with('message', 'Document dropped successfully');
        }

        if($this->checkIfHorHasBeenDroppedBefore($application->id)===true){
            $dropped_hor=DroppedHealthReport::where('app_id',$application->id)->where('status','AWAITING-REUPLOAD')->first();
            $this->storeDroppedDoc($application->id,$document->id,$comment,$dropped_hor->app_stage,$dropped_hor->app_stage_status);
            $application->app_stage="DROPPED";
            $application->app_stage_status="AWAITING-DOCUMENT-REUPLOAD";
            $application->save();
            return redirect()->back()->with('message', 'Document dropped successfully');
        }


        if($this->checkIfPpiHasBeenDroppedBefore($application->id)===true){
            $dropped_ppi=DroppedPpiReport::where('app_id',$application->id)->where('status','AWAITING-REUPLOAD')->first();
            $this->storeDroppedDoc($application->id,$document->id,$comment,$dropped_ppi->app_stage,$dropped_ppi->app_stage_status);
            $application->app_stage="DROPPED";
            $application->app_stage_status="AWAITING-DOCUMENT-REUPLOAD";
            $application->save();
            return redirect()->back()->with('message', 'Document dropped successfully');
        }

        $this->storeDroppedDoc($application->id,$document->id,$comment,$application->app_stage,$application->app_stage_status);
        $application->app_stage="DROPPED";
        $application->app_stage_status="AWAITING-DOCUMENT-REUPLOAD";
        $application->save();
        return redirect()->back()->with('message', 'Document dropped successfully');
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



    public function storeDroppedDoc($app_id,$document_id,$remark,$app_stage,$app_stage_status){
        DroppedApplicationDocument::create([
            'app_id'=>$app_id,
            'document_id'=>$document_id,
            'remark'=>$remark,
            'status'=>'AWAITING-REUPLOAD',
            'app_stage'=>$app_stage,
            'app_stage_status'=>$app_stage_status,
        ]);
    }
}
