<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SystemModels\Signature;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\SystemModels\Staff;
use App\SystemModels\Task;
use App\SystemModels\BpApplication;
use App\User;

class SignatureController extends Controller
{
    

    public function signDoc(Request $request){
        $v=Validator::make($request->all(),[
            'appid'=>['required', 'numeric', 'min:1', 'exists:bp_applications,id'],
            'signature-password'=>['required','string','min:2'],
        ]);

        if($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }

        

        $user=Auth::user();
        $es_staff=Staff::where('user_id',$user->id)->first();
        $application=BpApplication::where('id',$request->input('appid'))->first();
        $password=$request->input('signature-password');
        // die($password);
        if($this->authenticateSignaturePassword($user->id,$password)===false){
            $v = Validator::make([], []); // Empty data and rules fields
            $v->errors()->add('password', 'Invalid signature password');
            return redirect()->back()->withErrors($v->errors());
        }

        $this->updateEsIdpaSigningTask($es_staff->id,$application->id);
        $this->assignIdpaDespatchHoa($application->id);
        $this->updateAppStatus($application);
        return redirect()->back()->with('message', 'Application signed successfully');
    }

    private function authenticateSignaturePassword($user_id,$password){
        $signature=Signature::where('user_id',$user_id)->first();
        if($signature===null){
            return false;
        }

        if(Hash::check($password,$signature->password)){
            return true;
        }

        return false;

    }

    private function updateEsIdpaSigningTask($staff_id,$app_id){
        $task=Task::where('task_type','IDPA-SIGNING')->where('task_status','PENDING')->where('staff_id',$staff_id)->where('app_id',$app_id)->first();
        $task->task_status='COMPLETED';
        $task->save();
    }

    private function assignIdpaDespatchHoa($app_id){
        $hoa_staff=Staff::where('staff_role','HOA')->where('status','ACTIVE')->first();
        $checklist_task=new Task;
        $checklist_task->app_id=$app_id;
        $checklist_task->staff_id=$hoa_staff->id;
        $checklist_task->task_type='IDPA-DISPATCH';
        $checklist_task->task_status='PENDING';
        $checklist_task->assigned_date=now();
        $checklist_task->save();
    }


    public function updateAppStatus($application){
        $application->app_stage_status='AWAITING-IDPA-DISPATCH';
        $application->save();

    }


    public function uploadUserSignature(Request $request){
        $v=Validator::make($request->all(),[
            'user_id'=>['required', 'numeric', 'min:1', 'exists:users,id'],
            'user_id'=>['required', 'numeric', 'min:1', 'unique:signatures,user_id'],
            'signature-password'=>['required','string','min:6'],
            'signature-image'=>['image','mimes:jpeg,png'],
        ]);


        if($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }
        

        $signature_image=$request->file('signature-image');
        $signature_path=$request->input('user_id')."SIGNATURE".'.'.$signature_image->getClientOriginalExtension();
        $signature_image->move(public_path('signatures'), $signature_path);
        $password=$request->input('signature-password');
        Signature::create([
            'user_id'=>$request->input('user_id'),
            'password'=>Hash::make($password),
            'signature_path'=>$signature_path,
        ]);

        return redirect()->back()->with('message', 'Signature uploaded successful');
    }
}
