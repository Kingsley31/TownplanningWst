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
use App\SystemModels\Slp;
use Illuminate\Support\Facades\Validator;
use App\User;

class SlpController extends Controller
{
    //

    public function uploadSlp(Request $request){
        $v=Validator::make($request->all(), [
            'siteplan' => ['required', 'image', 'mimes:jpeg,png'],
            'appid' => ['required', 'numeric', 'min:1', 'exists:bp_applications,id'],
        ]);

        if ($v->fails()) {
            //
            return redirect()->back()->withErrors($v)->withInput();
        }

        $application=BpApplication::where('id',$request->input('appid'))->first();
        //UPDATE ATPO TASK//
        $atpo_user=Auth::user();
        $atpo_staff=Staff::where('user_id',$atpo_user->id)->first();
        $atpo_task=Task::where('app_id',$application->id)->where('staff_id',$atpo_staff->id)->where('task_type','SLP-UPLOAD')->first();
        $atpo_task->task_status="COMPLETED";
        $atpo_task->save();

        $application->app_stage="ASSESMENT";
        $application->app_stage_status="AWAITING-ASSESSMENT";
        $application->save();

        //ASSIGN ASSESSMENT TO TPO THAT GAVE ATPO THE SLP TO GENERATE//
        $tpo_task=Task::where('app_id',$application->id)->where('task_type','ATPO-ASSIGNMENT')->first();
        $tpo_staff=Staff::where('id',$tpo_task->staff_id)->first();
        $tpo_task=new Task;
        $tpo_task->staff_id=$tpo_staff->id;
        $tpo_task->app_id=$application->id;
        $tpo_task->assigned_date=now();
        $tpo_task->task_type="BP_ASSESSMENT";
        $tpo_task->task_status="PENDING";
        $tpo_task->save();

        //UPLOAD SLP DOCUMENT//
        $siteplan=$request->file('siteplan');
        $slp=new Slp;
        $siteplan_path=$application->id."-SLP".'.'.$siteplan->getClientOriginalExtension();
        $slp->app_id=$application->id;
        $slp->description="Site location plan document";
        $slp->src=$siteplan_path;
        $slp->staff_id=$atpo_staff->id;
        $siteplan->move(public_path('documents'),$siteplan_path);
        $slp->save();

        return redirect()->back()->with('message', 'Slp uploaded successful');
    }
}
