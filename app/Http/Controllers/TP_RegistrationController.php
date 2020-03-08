<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SystemModels\Staff;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TP_RegistrationController extends Controller
{
    //

    public function registerStaff(Request $request){
        $v=Validator::make($request->all(), [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'office' => ['required', 'string', 'min:2'],
            'department' => ['required', 'string', 'min:2'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:55', 'unique:users,username'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($v->fails()) {
            //
            return redirect()->back()->withErrors($v)->withInput();
        }

        $user=User::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'username' => $request->input('username'),
            'role' => 'STAFF',
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $staff=Staff::create([
            'user_id'=>$user->id,
            'staff_role'=>$request->input('office'),
            'department'=>$request->input('department'),
            'status'=>"ACTIVE",
        ]);

        return redirect()->back()->with('message', 'Staff registered successfully');

    }

    public function registerApplicant(Request $request){
        $v=Validator::make($request->all(), [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:55', 'unique:users,username'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($v->fails()) {
            //
            return redirect()->back()->withErrors($v)->withInput();
        }


        $user=User::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'username' => $request->input('username'),
            'role' =>'APPLICANT',
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        
        return redirect()->route('clerkappregister')->with('message', 'User registeration successful');
    }
}
