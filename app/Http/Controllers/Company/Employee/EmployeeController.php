<?php

namespace App\Http\Controllers\Company\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeDetails;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=Employees::query()->where('company_id','1')->get();
        //return $data;
        return view('company.employees.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $employee=Employees::where('company_id',1)->first();
        return view('company.employees.create', compact('employee'));
    }

    public function details($id)
    {
        //
       // $employee=Employees::where('company_id',1)->first();
      // return $id; 
      $details=EmployeeDetails::where('employee_id',$id)->first();
       return view('company.employees.details',compact('id','details'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
      //  return $request->all();
        Employees::create([
            'company_id'=>Auth::guard('employee')->id(),
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile_no'=>$request->mobile_no,
            
            'password'=>Hash::make( $request->password),
            
            'is_owner'=>0
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $employee=Employees::find($id);
        return view('company.employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $employee=Employees::find($id);
        $employee->name=$request->name;
        $employee->email=$request->email;
        $employee->mobile_no=$request->mobile_no;
        $employee->status=$request->status;
        $employee->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Employees::find($id)->delete();
        return response(['success'=>1],200);
    }
}
