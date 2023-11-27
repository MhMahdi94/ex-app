<?php

namespace App\Http\Controllers\Company\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
   
    public function show_login_view(){
        return view('company.auth.login');
    }

    public function login(Request $request){
        // $valid=$request->validated([
        //     'email'=> 'required',
        //     'password'=> 'required',
        // ]);
        $res=auth()->guard('employee')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);
        //return $res;
        if($res){
           // toastr()->success('Your account has been restored.');
             return  redirect('/company/home');
        }else{
            return "not done";
        }
//        return $request->all();
    }
}
