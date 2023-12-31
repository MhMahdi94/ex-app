<?php

namespace App\Http\Controllers\Admin\BusinessOwner;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\BusniessCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BusinessOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=Business::get();
        return view('admin.business_owners.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $companies=BusniessCompany::get();
        return view('admin.business_owners.create', compact('companies'));
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
            'is_owner'=>1,
            'business_id'=>$request->business_id,
            'added_by'=>Auth::guard('admin')->id(),
        ]);
        return redirect()->back();
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
        return view('admin.business_owners.edit',compact('owner'));
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
