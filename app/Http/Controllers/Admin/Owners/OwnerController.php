<?php

namespace App\Http\Controllers\Admin\Owners;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Company;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=Employees::where('is_owner',1)->get();
        return view('admin.owners.index', compact('data'));
    }
    public function search(Request $request)
    {
        //
        $data=Employees::where('email','LIKE',$request['query'])->orWhere('mobile_no','LIKE',$request['query'])-> get();
     
        
       // dd($user->hasPermissionTo('create-admin'));
        return view('admin.owners.index',compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $companies=Company::get();
        return view('admin.owners.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //return $request->all();
        $employee=Employees::create([
            'company_id'=>$request->company_id,
            'name'=>['en'=>$request->english_name,'ar'=>$request->arabic_name,],
            'email'=>$request->email,
            'mobile_no'=>$request->mobile_no,
            'password'=>Hash::make( $request->password),
            
            'is_owner'=>1
        ]);
        $employee->assignRole(3);
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
        $employee = Employees::find($id);
        $companies=Company::get();
        return view('admin.owners.edit', compact('employee','companies'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        
        $employee = Employees::find($id);
        $employee->company_id=$request->company_id;
        $employee->name=$request->name;
        $employee->email=$request->email;
        $employee->mobile_no=$request->mobile_no;
        $employee->save();
        return redirect()->back() ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Employees::find($id)->delete();
    }
}
