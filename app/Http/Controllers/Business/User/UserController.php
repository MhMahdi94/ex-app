<?php

namespace App\Http\Controllers\Business\User;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // return Auth::guard('business')->user();
        $data=Business::where('is_owner','!=',1)->where('business_id', Auth::guard('business')->user()->business_id)->get();
        return view('business.users.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $companies=[];
        return view('business.users.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Business::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile_no'=>$request->mobile_no,
            'password'=>Hash::make( $request->password),
            'is_owner'=>0,
            'business_id'=>Auth::guard('business')->user()->business_id,
            'added_by'=>Auth::guard('admin')->id(),
        ]);
        return redirect()->back();
       // return $request->all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $owner=Business::find($id);
        return view('business.users.edit',compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $business=Business::find($id);
        $business->name=$request->name;
        $business->email=$request->email;
        $business->mobile_no=$request->mobile_no;
        $business->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Business::find($id)->delete();
    }
}
