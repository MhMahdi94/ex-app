<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function show_login_view(){
        return view('admin.auth.login');
    }

    public function login(Request $request){
        // $valid=$request->validated([
        //     'email'=> 'required',
        //     'password'=> 'required',
        // ]);
        $res=auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);
      //  return $res;
        if($res){
            toastr()->success('Your account has been restored.');
             return  redirect('/admin/home');
        }else{
            return "not done";
        }
        return $request->all();
    }
}
