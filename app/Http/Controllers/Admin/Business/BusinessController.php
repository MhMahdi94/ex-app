<?php

namespace App\Http\Controllers\Admin\Business;

use App\Http\Controllers\Controller;
use App\Models\BusniessCompany;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=BusniessCompany::get();
        return view('admin.business_companies.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.business_companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        BusniessCompany::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile_no'=>$request->mobile_no,
            'subscriptionStart'=>$request->subscriptionStart,
            'subscriptionEnd'=>$request->subscriptionEnd,
            'is_owner'=>1,
            'desc'=>$request->description ,
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
        $business_company=BusniessCompany::find($id);
        return view('admin.business_companies.edit', compact('business_company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $business_company=BusniessCompany::find($id);
        $business_company->name=$request->name;
        $business_company->email=$request->email;
        $business_company->mobile_no=$request->mobile_no;
        $business_company->subscriptionStart=$request->subscriptionStart;
        $business_company->subscriptionEnd=$request->subscriptionEnd;
        $business_company->desc=$request->description;
        $business_company->save();
        return redirect()->back(); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        BusniessCompany::find($id)->delete();
    }
}
