<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\loginRequest;
use App\Http\Requests\signupRequest;
use App\Http\Requests\StoreNewRequestRequest;
use App\Http\Resources\NewRequestResource;
use App\Models\Employees;
use App\Models\NewRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
class AuthController extends Controller
{
    public function login(loginRequest $request){
        $data=$request->validated();
       if(!Auth::guard('employee')->attempt($data)){
        return response([
            'message'=>'Invalid Credentials'
        ]);
       }
       /** @var Employees $user */
       $user=Auth::guard('employee')->user();
       $token=$user->createToken('main')->plainTextToken;
       
       return response(compact('user','token')) 
        -> header('Access-Control-Allow-Headers', '*')
        -> header('Access-Control-Allow-Origin', '*')
        -> header('Access-Control-Allow-Methods', '*')
       ;
    }

    // public function signup(signupRequest $request){
    //     $data=$request->validated();
    //     $user= User::create([
    //          'name'=>$data['name'],
    //          'mobileNo'=>$data['mobileNo'],
    //          'role'=>$data['role'],
    //          'email'=>$data['email'],
    //          'password'=>bcrypt($data['password'])
    //      ]);
 
    //      $token=$user->createToken('main')->plainTextToken;
 
    //      return response(compact('user','token'));
    // }

    public function logout(Request $request){
        /** @var User $user */
        $user=$request->user();
        $user->tokens()->delete();
        return response('',204);
    }
    public function NewRequest(StoreNewRequestRequest $request)
    {
        //
        $data=$request->validated();
        $newRequest=NewRequest::create($data);
        return response(new NewRequestResource($newRequest),201);
    }
}
