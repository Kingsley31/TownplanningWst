<?php

namespace App\Http\Middleware;

use Closure;
use App\SystemModels\Staff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response=$next($request);
        $user=Auth::user();

        if($user==null){
            return $response;
        }
        
        if($user->role==='APPLICANT'){
            return redirect()->route('userdashboard');
        }elseif ($user->role==='STAFF') {
            $staff=Staff::where('user_id',$user->id)->first();
            
            if($staff==null){
                $v=Validator::make([],[]);
                $v->errors()->add('password', 'Invalid login credentials');
                return redirect()->back()->withErrors($v);
                
            }
            if($staff->staff_role==="CLERK"){
                return redirect()->route('clerkdashboard');
            }elseif ($staff->staff_role==="HOA") {
                return redirect()->route('hoadashboard');
            }elseif ($staff->staff_role==="ES") {
                return redirect()->route('esdashboard');
            }elseif ($staff->staff_role==="TPO") {
                return redirect()->route('tpodashboard');
            }elseif ($staff->staff_role==="ATPO") {
                return redirect()->route('atpodashboard');
            }elseif ($staff->staff_role==="HAC") {
                return redirect()->route('hacdashboard');
            }elseif ($staff->staff_role==="ACO") {
                return redirect()->route('accountofficerdashboard');
            }elseif ($staff->staff_role==="HO") {
                return redirect()->route('hodashboard');
            }elseif ($staff->staff_role==="ENG") {
                return redirect()->route('engrdashboard');
            }elseif ($staff->staff_role==="HICT") {
                return redirect()->route('hictdashboard');
            }
        }elseif ($user->role==='SUPER ADMIN') {
            # code...
        }
    }
}
