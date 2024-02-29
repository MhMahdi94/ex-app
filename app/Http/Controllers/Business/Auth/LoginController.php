<?php

namespace App\Http\Controllers\Business\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function show_login_view(){
        return view('business.auth.login');
    }

    public function login(Request $request){
        // $valid=$request->validated([
        //     'email'=> 'required',
        //     'password'=> 'required',
        // ]);
        $res=auth()->guard('business')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);
      //  return $res;
        if($res){
           // toastr()->success('Your account has been restored.');
             return  redirect('/business/home');
        }else{
            return "not done";
        }
        return $request->all();
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect(route('business.business.show_login'));
    }
}
