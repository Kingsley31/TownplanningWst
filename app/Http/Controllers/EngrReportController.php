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

class EngrReportController extends Controller
{
    //

    public function uploadEr(Request $request){
        $v=Validator::make($request->all(), [
            'er' => ['required', 'image', 'mimes:jpeg,png'],
            'comment' => ['required', 'string', 'min:1'],
            'appid' => ['required', 'numeric', 'min:1', 'exists:bp_applications,id'],
        ]);

        if ($v->fails()) {
            //
            return redirect()->back()->withErrors($v)->withInput();
        }

        $user=Auth::user();
        $engr_staff=Staff::where('user_id',$user->id)->first();
        $application=BpApplication::where('id',$request->input('appid'))->first();

        
        if($this->checkIfSirIsSummited($application->id)==true && $this->checkIfHorIsSubmitted($application->id)==true && $this->checkIfPpiIsSubmitted($application->id) ==true){
            $application->app_stage="CHECKLIST";
            $application->app_stage_status="AWAITING-HOA-ASSIGNMENT";
            $application->save();
            $this->assignHoaAssignmentTaskToActiveEs($application->id);
        }

        $comment=$request->input('comment');
        $er_image=$request->file('er');
        $image_path=$application->id."-ER".'.'.$er_image->getClientOriginalExtension();
        $this->uploadHorDoc($er_image,$image_path);
        $this->storeEr($application->id,$comment,$engr_staff->id,$image_path);
        $this->updateEngrErReportTaskToCompleted($engr_staff->id,$application->id);

        return redirect()->back()->with('message', 'Engineer report uploaded successful');

    }

    public function checkIfSirIsSummited($app_id){
        $sir=SirReport::where('app_id',$app_id)->first();

        if($sir==null){
            return false;
        }

        return true;
    }

    public function checkIfPpiIsSubmitted($app_id){
        $ppi=PpiReport::where('app_id',$app_id)->first();

        if($ppi==null){
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

    public function uploadHorDoc($er_image,$image_path){
        $er_image->move(public_path('documents'),$image_path);
    }


    public function storeEr($app_id,$comment,$staff_id,$image_path){
        $er=new EngrReport;
        $er->app_id=$app_id;
        $er->recommended='YES';
        $er->comment=$comment;
        $er->src=$image_path;
        $er->staff_id=$staff_id;
        $er->save();
    }

    public function updateEngrErReportTaskToCompleted($staff_id,$app_id){
        $task=Task::where('staff_id',$staff_id)->where('task_type','ER-REPORT')->where('task_status','PENDING')->where('app_id',$app_id)->first();
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
