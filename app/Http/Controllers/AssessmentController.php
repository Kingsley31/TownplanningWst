<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\SystemModels\BpApplication;
use Illuminate\Support\Facades\DB;
use App\SystemModels\SuperZone;
use App\SystemModels\Zone;
use App\SystemModels\Village;
use App\SystemModels\Task;
use App\SystemModels\Staff;
use App\SystemModels\Assessment;
use App\SystemModels\ModifiedAssessment;
use Illuminate\Support\Facades\Validator;
use App\User;

class AssessmentController extends Controller
{
    //

    public function uploadTpoAssessment(Request $request){
        $v=Validator::make($request->all(), [
            'appid' => ['required', 'numeric', 'min:1', 'exists:bp_applications,id'],
            'planningrate' => ['required', 'numeric', 'min:1'],
            'inspectionrate' => ['required', 'numeric', 'min:1'],
            'registrationfee' => ['required', 'numeric', 'min:1'],
            'chartingfee' => ['required', 'numeric', 'min:1'],
            'fencingfee' => ['required', 'numeric', 'min:1'],
            'igr' => ['required', 'numeric', 'max:90000000'],
            'stagepermit' => ['required', 'numeric', 'min:1'],
            'penalty' => ['required', 'numeric', 'min:0'],
            'total' => ['required', 'numeric', 'min:0'],
        ]);

        if ($v->fails()) {
            //
            return redirect()->back()->withErrors($v)->withInput();
        }

        $application=BpApplication::where('id',$request->input('appid'))->first();
        //UPDATE TPO TASK//
        $tpo_user=Auth::user();
        $tpo_staff=Staff::where('user_id',$tpo_user->id)->first();
        $tpo_task=Task::where('app_id',$application->id)->where('staff_id',$tpo_staff->id)->where('task_type','BP_ASSESSMENT')->first();
        $tpo_task->task_status="COMPLETED";
        $tpo_task->save();

        $application->app_stage_status="AWAITING-ASSESSMENT-APPROVAL";
        $application->save();
        
        //ASSIGN ASSESSMENT APPROVAL TO ES
        $es_staff=Staff::where('staff_role','ES')->where('status','ACTIVE')->first();
        $es_task=new Task;
        $es_task->staff_id=$es_staff->id;
        $es_task->app_id=$application->id;
        $es_task->assigned_date=now();
        $es_task->task_type="ASSESSMENT-APPROVAL";
        $es_task->task_status="PENDING";
        $es_task->save();

        $assessment=new Assessment;
        $assessment->app_id=$application->id;
        $assessment->staff_id=$tpo_staff->id;
        $assessment->planning_rate=$request->input('planningrate');
        $assessment->inspection_rate=$request->input('inspectionrate');
        $assessment->registration_fee=$request->input('registrationfee');
        $assessment->charting_fee=$request->input('chartingfee');
        $assessment->fencing_fee=$request->input('fencingfee');
        $assessment->stages_permit_fee=$request->input('stagepermit');
        $assessment->igr_fee=$request->input('igr');
        $assessment->penalty_fee=$request->input('penalty');
        $assessment->total=$request->input('planningrate')+
        $request->input('inspectionrate')+$request->input('registrationfee')
        +$request->input('chartingfee')+$request->input('fencingfee')+$request->input('stagepermit')+$request->input('igr')+$request->input('penalty');
        $assessment->save();
        return redirect()->back()->with('message', 'Assessment uploaded successfully');

    }


    public function esApproveAssessment(Request $request){
        $v=Validator::make($request->all(), [
            'appid' => ['required', 'numeric', 'min:1', 'exists:bp_applications,id'],
            'planningrate' => ['required', 'numeric', 'min:1'],
            'inspectionrate' => ['required', 'numeric', 'min:1'],
            'registrationfee' => ['required', 'numeric', 'min:1'],
            'chartingfee' => ['required', 'numeric', 'min:1'],
            'fencingfee' => ['required', 'numeric', 'min:1'],
            'igr' => ['required', 'numeric', 'max:90000000'],
            'stagepermit' => ['required', 'numeric', 'min:1'],
            'penalty' => ['required', 'numeric', 'min:0'],
            'total' => ['required', 'numeric', 'min:0'],
        ]);

        if ($v->fails()) {
            //
            return redirect()->back()->withErrors($v)->withInput();
        }

        $es_user=Auth::user();
        $es_staff=Staff::where('user_id',$es_user->id)->first();
        
        $assessment=Assessment::where('app_id',$request->input('appid'))->first();
        if($this->checkIfAssessmentWasModified($request,$assessment)){
            //ES MODIFIED THE ASSESSMENT MOVE THE FORMAL ASSESSEMENT TO MODIFIEDASSESSMENT TABLE
            $this->uploadModifiedAssessment($assessment,$es_staff->id);
        }
        
        //UPLOAD ES ASSESSMENT ON THE TPO ASSESSMENT
        $this->updateAssessment($assessment,$request,$es_staff->id);

        $application=BpApplication::where('id',$request->input('appid'))->first();
        //UPDATE ES TASK//
        $es_task=Task::where('app_id',$application->id)->where('staff_id',$es_staff->id)->where('task_type','ASSESSMENT-APPROVAL')->first();
        $es_task->task_status="COMPLETED";
        $es_task->save();

        $application->app_stage="PAYMENT";
        $application->app_stage_status="AWAITING-ACCOUNT-OFFICER-ASSIGNMENT";
        $application->save();
        $this->assignAccountOfficerAssignmentTaskToHeadOfAccount($application->id);

        return redirect()->back()->with('message', 'Assessment uploaded successfully');
    }

    public function checkIfAssessmentWasModified($request,$assessment){
        $assessmentModified=false;
        if($request->input('planningrate')!=$assessment->planning_rate){
            $assessmentModified=true;
            return $assessmentModified;
        }

        if($request->input('inspectionrate')!=$assessment->inspection_rate){
            $assessmentModified=true;
            return $assessmentModified;
        }

        if($request->input('registrationfee')!=$assessment->registration_fee){
            $assessmentModified=true;
            return $assessmentModified;
        }

        if($request->input('registrationfee')!=$assessment->registration_fee){
            $assessmentModified=true;
            return $assessmentModified;
        }

        if($request->input('chartingfee')!=$assessment->charting_fee){
            $assessmentModified=true;
            return $assessmentModified;
        }

        if($request->input('fencingfee')!=$assessment->fencing_fee){
            $assessmentModified=true;
            return $assessmentModified;
        }

        if($request->input('stagepermit')!=$assessment->stages_permit_fee){
            $assessmentModified=true;
            return $assessmentModified;
        }

        if($request->input('igr')!=$assessment->igr_fee){
            $assessmentModified=true;
            return $assessmentModified;
        }

        if($request->input('penalty')!=$assessment->penalty_fee){
            $assessmentModified=true;
            return $assessmentModified;
        }

        return $assessmentModified;
    }


    public function uploadModifiedAssessment($assessment,$es_staff_id){
        $modified_assessment=new ModifiedAssessment;
        $modified_assessment->assessment_id=$assessment->id;
        $modified_assessment->app_id=$assessment->app_id;
        $modified_assessment->staff_id=$assessment->staff_id;
        $modified_assessment->planning_rate=$assessment->planning_rate;
        $modified_assessment->inspection_rate=$assessment->inspection_rate;
        $modified_assessment->registration_fee=$assessment->registration_fee;
        $modified_assessment->charting_fee=$assessment->charting_fee;
        $modified_assessment->fencing_fee=$assessment->fencing_fee;
        $modified_assessment->stages_permit_fee=$assessment->stages_permit_fee;
        $modified_assessment->igr_fee=$assessment->igr_fee;
        $modified_assessment->penalty_fee=$assessment->penalty_fee;
        $modified_assessment->total=$assessment->total;
        $modified_assessment->modified_by=$es_staff_id;
        $modified_assessment->save();
    }


    public function updateAssessment($assessment,$request,$es_staff_id){
        $assessment->planning_rate=$request->input('planningrate');
        $assessment->inspection_rate=$request->input('inspectionrate');
        $assessment->registration_fee=$request->input('registrationfee');
        $assessment->charting_fee=$request->input('chartingfee');
        $assessment->fencing_fee=$request->input('fencingfee');
        $assessment->stages_permit_fee=$request->input('stagepermit');
        $assessment->igr_fee=$request->input('igr');
        $assessment->penalty_fee=$request->input('penalty');
        $assessment->total=$request->input('planningrate')+
        $request->input('inspectionrate')+$request->input('registrationfee')
        +$request->input('chartingfee')+$request->input('fencingfee')+$request->input('stagepermit')+$request->input('igr')+$request->input('penalty');
        $assessment->approved='YES';
        $assessment->approved_by=$es_staff_id;
        $assessment->save();
    }



    public function assignAccountOfficerAssignmentTaskToHeadOfAccount($app_id){
        //ASSIGN ACCOUNT OFFICER ASSIGNMENT TASK TO HAC(HEAD OF ACCOUNT)
        $hac_staff=Staff::where('staff_role','HAC')->where('status','ACTIVE')->first();
        $hac_task=new Task;
        $hac_task->staff_id=$hac_staff->id;
        $hac_task->app_id=$app_id;
        $hac_task->assigned_date=now();
        $hac_task->task_type="ACCOUNT-OFFICER-ASSIGNMENT";
        $hac_task->task_status="PENDING";
        $hac_task->save();
    }
}
