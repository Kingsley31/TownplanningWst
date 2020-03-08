<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\SystemModels\Task;
use App\SystemModels\Staff;
use Illuminate\Support\Facades\Validator;
use App\SystemModels\BpApplication;
use App\SystemModels\Payment;
use App\SystemModels\Assessment;
use App\User;

class PaymentController extends Controller
{
    //


    public function assignPaymentToAccountOfficer(Request $request){
        $v=Validator::make($request->all(), [
            'aco' => ['required', 'numeric', 'min:1', 'exists:users,id'],
            'appid' => ['required', 'numeric', 'min:1', 'exists:bp_applications,id'],
        ]);

        if ($v->fails()) {
            //
            return redirect()->back()->withErrors($v)->withInput();
        }


        $application=BpApplication::where('id',$request->input('appid'))->first();

        $hac_user=Auth::user();
        $hac_staff=Staff::where('user_id',$hac_user->id)->first();
        $hac_task=Task::where('app_id',$application->id)->where('staff_id',$hac_staff->id)->where('task_type','ACCOUNT-OFFICER-ASSIGNMENT')->first();
        $hac_task->task_status="COMPLETED";
        $hac_task->save();

        $staff=Staff::where('user_id',$request->input('aco'))->first();
        $task=new Task;
        $task->staff_id=$staff->id;
        $task->app_id=$application->id;
        $task->assigned_date=now();
        $task->task_type="PAYMENT-CONFIRMATION";
        $task->task_status="PENDING";
        $task->save();
        $application->app_stage_status="AWAITING-PAYMENT-CONFIRMATION";
        $application->save();
        return redirect()->back()->with('message', 'Application payment confirmation assigned to account officer successfully');
    }


    public function accountOfficerConfirmPayment(Request $request){
        $v=Validator::make($request->all(), [
            'receipt' => ['required', 'image', 'mimes:jpeg,png'],
            'supposedamount' => ['required', 'numeric', 'min:0'],
            'paymentmode' => ['required', 'string', 'max:255'],
            'appid' => ['required', 'numeric', 'min:1', 'exists:bp_applications,id'],
        ]);

        if ($v->fails()) {
            //
            return redirect()->back()->withErrors($v)->withInput();
        }


        $application=BpApplication::where('id',$request->input('appid'))->first();
        //UPDATE ACO TASK//
        $aco_user=Auth::user();
        $aco_staff=Staff::where('user_id',$aco_user->id)->first();
        $aco_task=Task::where('app_id',$application->id)->where('staff_id',$aco_staff->id)->where('task_type','PAYMENT-CONFIRMATION')->first();
        $aco_task->task_status="COMPLETED";
        $aco_task->save();

        $application->app_stage="REPORT";
        $application->app_stage_status="AWAITING-REPORTS-ASSIGNMENT";
        $application->save();

        //ASSIGN REPORTS ASSIGNMENT TO ES//
        $es_staff=Staff::where('staff_role','ES')->where('status','ACTIVE')->first();
        $es_task=new Task;
        $es_task->staff_id=$es_staff->id;
        $es_task->app_id=$application->id;
        $es_task->assigned_date=now();
        $es_task->task_type="REPORTS-ASSIGNMENT";
        $es_task->task_status="PENDING";
        $es_task->save();

        //GET APP ASSESSMENT//
        $assessment=Assessment::where('app_id',$request->input('appid'))->first();
        //UPLOAD PAYMENT DOCUMENT//
        $receipt=$request->file('receipt');
        $payment=new Payment;
        $receipt_path=$application->id."-RECEIPT".'.'.$receipt->getClientOriginalExtension();
        $payment->app_id=$application->id;
        $payment->amount_paid=$request->input('supposedamount');
        $payment->supposed_amount=$assessment->total;
        $payment->receipt_src=$receipt_path;
        $payment->payment_status="PAID";
        $payment->es_approval="APPROVED";
        $payment->es_comment="PAYMENT CONFIRMED";
        $payment->payment_mode=$request->input('paymentmode');
        $receipt->move(public_path('receipts'),$receipt_path);
        $payment->save();

        return redirect()->back()->with('message', 'Payment confirmed successfully');
    }
}
