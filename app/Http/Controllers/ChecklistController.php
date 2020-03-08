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
use App\SystemModels\BpApplicationDocument;
use Illuminate\Support\Facades\Validator;
use App\User;

class ChecklistController extends Controller
{
    //

    public function assignChecklist(Request $request){
        $v=Validator::make($request->all(),[
            'appid'=>['required', 'numeric', 'min:1', 'exists:bp_applications,id'],
        ]);

        if($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }

        $user=Auth::user();
        $es_staff=Staff::where('user_id',$user->id)->first();
        $application=BpApplication::where('id',$request->input('appid'))->first();
        $this->assignChecklistToHoa($application->id);
        $this->updateEsHoaAssignmentTaskToCompleted($es_staff->id,$application->id);
        $this->updateAppStatus($application);
        
        return redirect()->back()->with('message', 'Application approved for checklist successfully');
        
    }

    public function assignChecklistToHoa($app_id){
        $hoa_staff=Staff::where('staff_role','HOA')->where('status','ACTIVE')->first();
        $checklist_task=new Task;
        $checklist_task->app_id=$app_id;
        $checklist_task->staff_id=$hoa_staff->id;
        $checklist_task->task_type='CHECKLIST-APPROVAL';
        $checklist_task->task_status='PENDING';
        $checklist_task->assigned_date=now();
        $checklist_task->save();
    }

    public function updateEsHoaAssignmentTaskToCompleted($staff_id,$app_id){
        $task=Task::where('task_type','HOA-ASSIGNMENT')->where('task_status','PENDING')->where('staff_id',$staff_id)->where('app_id',$app_id)->first();
        $task->task_status='COMPLETED';
        $task->save();
    }

    public function updateAppStatus($application){
        $application->app_stage_status='AWAITING-CHECKLIST-APPROVAL';
        $application->save();

    }

    public function approveChecklist(Request $request){
        $v=Validator::make($request->all(),[
            'appid'=>['required', 'numeric', 'min:1', 'exists:bp_applications,id'],
        ]);

        if($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }


        $user=Auth::user();
        $hoa_staff=Staff::where('user_id',$user->id)->first();

        $application=BpApplication::where('id',$request->input('appid'))->first();
        $application->app_stage="IDPA";
        $application->app_stage_status="AWAITING-SIGNATORY";
        $application->save();

        $this->updateHoaChecklistTaskStatusToCompleted($hoa_staff->id,$application->id);
        $this->assignIdpaSigningToEs($application->id);
        return redirect()->back()->with('message', 'Application approved for IDPA signing successfully');

    }


    public function updateHoaChecklistTaskStatusToCompleted($staff_id,$app_id){
        $task=Task::where('task_type','CHECKLIST-APPROVAL')->where('task_status','PENDING')->where('staff_id',$staff_id)->where('app_id',$app_id)->first();
        $task->task_status='COMPLETED';
        $task->save();
    }

    public function assignIdpaSigningToEs($app_id){
        $hoa_staff=Staff::where('staff_role','ES')->where('status','ACTIVE')->first();
        $checklist_task=new Task;
        $checklist_task->app_id=$app_id;
        $checklist_task->staff_id=$hoa_staff->id;
        $checklist_task->task_type='IDPA-SIGNING';
        $checklist_task->task_status='PENDING';
        $checklist_task->assigned_date=now();
        $checklist_task->save();
    }
}
