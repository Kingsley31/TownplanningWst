<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SystemModels\Staff;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function changePassword(Request $request){
        $v=Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($v->fails()) {
            //
            return redirect()->back()->withErrors($v)->withInput();
        }


	$user=User::where('email',$request->input('email'))->first();
	$user->password=Hash::make($request->input('password'));
        $user->save();

        return redirect()->back()->with('message', 'Password changed successfully');

    }

    public function showChangePassword(){
        $user=Auth::user();
        return view('changepassword',['user'=>$user]);
    }

}
