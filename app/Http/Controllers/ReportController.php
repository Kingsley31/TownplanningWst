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
use Illuminate\Support\Facades\Validator;
use App\User;

class ReportController extends Controller
{
    //


    public function assignReports(Request $request){
        $v=Validator::make($request->all(), [
            'tposir' => ['required', 'numeric', 'min:1', 'exists:users,id'],
            'hohor' => ['required', 'numeric', 'min:1', 'exists:users,id'],
            'tpoppi' => ['required', 'numeric', 'min:1', 'exists:users,id'],
            'appid' => ['required', 'numeric', 'min:1', 'exists:bp_applications,id'],
        ]);


        if ($v->fails()) {
            //
            return redirect()->back()->withErrors($v)->withInput();
        }

        $es_user=Auth::user();
        $es_staff=Staff::where('user_id',$es_user->id)->first();
        $application=BpApplication::where('id',$request->input('appid'))->first();

        if($application->app_building_height>1){
             $v=Validator::make($request->all(), [
                'engineercer' => ['required', 'numeric', 'min:1', 'exists:users,id'],
            ]);

            if ($v->fails()) {
                //
                return redirect()->back()->withErrors($v)->withInput();
            }

            $this->assignCer($request,$application);
        }
        $this->assignSir($request,$application);
        $this->assignHor($request,$application);
        $this->assignPpi($request,$application);
        $this->updateApplicationStatusToAwaitingReport($application);
        $this->updateEsReportsAssignmentTask($application,$es_staff);
        return redirect()->back()->with('message', 'Reports assigned successfully');

    }

    private function updateEsReportsAssignmentTask($application,$es_staff){
         //UPDATE ES TASK//
         $es_task=Task::where('app_id',$application->id)->where('staff_id',$es_staff->id)->where('task_type','REPORTS-ASSIGNMENT')->first();
         $es_task->task_status="COMPLETED";
         $es_task->save();
    }

    private function assignSir(Request $request,$application){
        $staff=Staff::where('user_id',$request->input('tposir'))->first();
        $application=BpApplication::where('id',$request->input('appid'))->first();
        $task=new Task;
        $task->staff_id=$staff->id;
        $task->app_id=$application->id;
        $task->assigned_date=now();
        $task->task_type="SIR-REPORT";
        $task->task_status="PENDING";
        $task->save();
    }

    private function assignHor(Request $request,$application){
        $staff=Staff::where('user_id',$request->input('hohor'))->first();
        $application=BpApplication::where('id',$request->input('appid'))->first();
        $task=new Task;
        $task->staff_id=$staff->id;
        $task->app_id=$application->id;
        $task->assigned_date=now();
        $task->task_type="HR-REPORT";
        $task->task_status="PENDING";
        $task->save();
    }

    private function assignCer(Request $request,$application){
        $staff=Staff::where('user_id',$request->input('engineercer'))->first();
        $application=BpApplication::where('id',$request->input('appid'))->first();
        $task=new Task;
        $task->staff_id=$staff->id;
        $task->app_id=$application->id;
        $task->assigned_date=now();
        $task->task_type="ER-REPORT";
        $task->task_status="PENDING";
        $task->save();
    }


    private function assignPpi(Request $request,$application){
        $staff=Staff::where('user_id',$request->input('tpoppi'))->first();
        $application=BpApplication::where('id',$request->input('appid'))->first();
        $task=new Task;
        $task->staff_id=$staff->id;
        $task->app_id=$application->id;
        $task->assigned_date=now();
        $task->task_type="PPI-REPORT";
        $task->task_status="PENDING";
        $task->save();
    }

    private function updateApplicationStatusToAwaitingReport($application){
        $application->app_stage_status="AWAITING-REPORTS-UPLOAD";
        $application->save();
    }
}
