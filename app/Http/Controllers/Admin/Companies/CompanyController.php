<?php

namespace App\Http\Controllers\Admin\Companies;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employees;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=Company::get();
        return view('admin.companies.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $owners=Employees::where('is_owner',1)->get();
        return view('admin.companies.create', compact('owners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Company::create(
            [
                'name'=>$request->name,
                'owner_id'=>$request->owner_id,
                'email'=>$request->email,
                'description'=>$request->description,
                'noOfDept'=>$request->noOfDept,
                'noOfEmployee'=>$request->noOfEmployee,
                //'mobile_no'=>$request->mobile_no,
                'subscriptionStart'=>$request->subscriptionStart,
                'subscriptionEnd'=>$request->subscriptionEnd,
            ]
        );
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
