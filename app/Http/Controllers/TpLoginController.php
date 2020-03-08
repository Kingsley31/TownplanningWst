<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TpLoginController extends Controller
{
    //

    public function loginUser(Request $request){
        $email=$request->input('email');
        $password=$request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user=Auth::user();
            return $user;
            
        }else {
            $v = Validator::make([],[]);
            $v->errors()->add('email', '');
            $v->errors()->add('password', 'Invalid login credentials');
            return redirect()->back()->withErrors($v);
            
        }
    }

   
}
