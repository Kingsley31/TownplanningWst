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
use Illuminate\Support\Facades\Validator;
use App\User;

class BpApplicationController extends Controller
{
    //

    public function generateAppNumber(){
        $number = mt_rand(1000, 9999);
        $bapp=DB::table('bp_applications')->latest()->first();
        if($bapp==null){
            return 0001;
        }

        return $bapp->application_number+1;
    }


    public function generateFileNumber($superzone,$zone,$village,$appno){
        $spzone=SuperZone::where('id',$superzone)->first();
        $spkey=$spzone->key;
        $zozone=Zone::where('id',$zone)->first();
        $zokey=$zozone->zone_key;
        $vill=Village::where('id',$village)->first();
        $villKey=$vill->key;
        $file_number="OS/TPA/".$spkey."/".$zokey."/".$villKey."/".$appno;
        return $file_number;
    }


    public function registerBapplication(Request $request){
        $v=Validator::make($request->all(), [
            'appnumber' => ['required', 'numeric', 'min:1'],
            'superzone' => ['required', 'numeric', 'min:1'],
            'zone' => ['required', 'numeric', 'min:1'],
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users'],
            'village' => ['required', 'numeric', 'min:1'],
            'filenumber' => ['required', 'string', 'max:255'],
            'buildingheight' => ['required', 'string', 'max:255'],
            'buildingtype' => ['required', 'string', 'max:255'],
        ]);

        if ($v->fails()) {
            //
            return redirect()->back()->withErrors($v)->withInput();
        }

        $user=User::where('email',$request->input('email'))->first();
        $bapplication=BpApplication::create([
            'developer_user_id' =>$user->id,
            'application_number' => $request->input('appnumber'),
            'super_zone' => $request->input('superzone'),
            'zone_id' => $request->input('zone'),
            'village_id' => $request->input('village'),
            'file_no' => $request->input('filenumber'),
            'app_stage' =>'REGISTERED',
            'app_stage_status' =>'AWAITING-DOCUMENTS-UPLOAD',
            'app_building_height' => $request->input('buildingheight'),
            'building_type' => $request->input('buildingtype'),
        ]);

        return redirect()->route('clerkappdocumentregister')->with('message', 'Building Application registeration successful');
    }


    public function searchApps(Request $request){
        $search_criteria=$request->input('searchcriteria');
        $search_text=$request->input('searchtext');
        $building_applications=[];

        switch ($search_criteria) {
            case 'firstname':
                $developers=User::where('firstname',$search_text)->get();
                foreach ($developers as $developer) {
                    if($developer!=null){
                        $building_applicationx=BpApplication::where('developer_user_id',$developer->id)->get();
                        $this->loadBpApplicationsData($building_applicationx);
                        foreach ($building_applicationx as $building_application) {
                            array_push($building_applications,$building_application);
                        }
                        
                    }
                }
                
               
                break;
            case 'surname':
                $developers=User::where('lastname',$search_text)->get();
                foreach ($developers as $developer) {
                    if($developer!=null){
                        $building_applicationx=BpApplication::where('developer_user_id',$developer->id)->get();
                        $this->loadBpApplicationsData($building_applicationx);
                        foreach ($building_applicationx as $building_application) {
                            array_push($building_applications,$building_application);
                        }
                        
                    }
                }
                break;
            case 'phone':
                $developer=User::where('phone',$search_text)->first();
                if($developer!=null){
                    $building_applications=BpApplication::where('developer_user_id',$developer->id)->get();
                    $this->loadBpApplicationsData($building_applications);
                }
                break;
            case 'village':
                $village=Village::where('village_name',$search_text)->first();
                if($village!=null){
                    $building_applications=BpApplication::where('village_id',$village->id)->get();
                    $this->loadBpApplicationsData($building_applications);
                }
                break;
            case 'zone':
                $zone=Zone::where('zone_name',$search_text)->first();
                if($zone!=null){
                    $building_applications=BpApplication::where('zone_id',$zone->id)->get();
                    $this->loadBpApplicationsData($building_applications);
                }
                break;
            case 'superzone':
                $superzone=SuperZone::where('name',$search_text)->first();
                if($superzone!=null){
                    $building_applications=BpApplication::where('super_zone',$superzone->id)->get();
                    $this->loadBpApplicationsData($building_applications);
                }
                break;
            default:
                # code...
                break;
        }

        return $building_applications;
    }

    public function assignAppToTpoForSlp(Request $request){
        $v=Validator::make($request->all(), [
            'tpo' => ['required', 'numeric', 'min:1', 'exists:users,id'],
            'appid' => ['required', 'numeric', 'min:1', 'exists:bp_applications,id'],
        ]);

        if ($v->fails()) {
            //
            return redirect()->back()->withErrors($v)->withInput();
        }

        $staff=Staff::where('user_id',$request->input('tpo'))->first();
        $application=BpApplication::where('id',$request->input('appid'))->first();
        $task=new Task;
        $task->staff_id=$staff->id;
        $task->app_id=$application->id;
        $task->assigned_date=now();
        $task->task_type="ATPO-ASSIGNMENT";
        $task->task_status="PENDING";
        $task->save();
        $application->app_stage_status="AWAITING-ATPO-ASSIGNMENT";
        $application->save();
        return redirect()->back()->with('message', 'Application assigned to TPO successfully');

    }


    public function assignAppToAtpoForSlpGeneration(Request $request){
        $v=Validator::make($request->all(), [
            'atpo' => ['required', 'numeric', 'min:1', 'exists:users,id'],
            'appid' => ['required', 'numeric', 'min:1', 'exists:bp_applications,id'],
        ]);

        if ($v->fails()) {
            //
            return redirect()->back()->withErrors($v)->withInput();
        }


        $application=BpApplication::where('id',$request->input('appid'))->first();

        $tpo_user=Auth::user();
        $tpo_staff=Staff::where('user_id',$tpo_user->id)->first();
        $tpo_task=Task::where('app_id',$application->id)->where('staff_id',$tpo_staff->id)->where('task_type','ATPO-ASSIGNMENT')->first();
        $tpo_task->task_status="COMPLETED";
        $tpo_task->save();

        $staff=Staff::where('user_id',$request->input('atpo'))->first();
        $task=new Task;
        $task->staff_id=$staff->id;
        $task->app_id=$application->id;
        $task->assigned_date=now();
        $task->task_type="SLP-UPLOAD";
        $task->task_status="PENDING";
        $task->save();
        $application->app_stage_status="AWAITING-SLP-UPLOAD";
        $application->save();
        return redirect()->back()->with('message', 'Application assigned to ATPO successfully');
    }

    public function loadBpApplicationsData($building_applications){
        
        if(count($building_applications)>0){
            foreach ($building_applications as $building_application) {
                $user=User::where('id',$building_application->developer_user_id)->first();
                $building_application->user=$user;
                $superzone=SuperZone::where('id',$building_application->super_zone)->first();
                $building_application->superzone=$superzone;
                $zone=Zone::where('id',$building_application->zone_id)->first();
                $building_application->zone=$zone;
                $village=Village::where('id',$building_application->village_id)->first();
                $building_application->village=$village;
            }


        }

    }
}
