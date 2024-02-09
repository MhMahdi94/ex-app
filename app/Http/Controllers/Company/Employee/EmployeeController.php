<?php

namespace App\Http\Controllers\Company\Employee;

use App\Http\Controllers\Controller;
use App\Models\Allowence;
use App\Models\Department;
use App\Models\EmployeeDetails;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=Employees::query()->where('company_id',Auth::guard('employee')->user()->company_id)->get();
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
        $roles = Role::where('guard_name','employee')->pluck('name')->all();
        $allowences=[];
        
        return view('company.employees.create', compact('employee','allowences','roles'));
    }

    public function details($id)
    {
        //
       // $employee=Employees::where('company_id',1)->first();
       //return Auth::guard('employee')->user()->company_id; 
      $details=EmployeeDetails::where('employee_id',$id)->first();
      $allowences=Allowence::where('employee_id',$id)->get();
      $departments=Department::where('company_id',Auth::guard('employee')->user()->company_id)->get();
      //return $departments;
       return view('company.employees.details',compact('id','details','allowences','departments'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
      // return $request->all();
      //return Auth::guard('employee')->user()->company_id;
        $employee=Employees::create([
            'company_id'=>Auth::guard('employee')->user()->company_id,
            'name'=>['en'=>$request->english_name,'ar'=>$request->arabic_name,],
            'email'=>$request->email,
            'mobile_no'=>$request->mobile_no,
            
            'password'=>Hash::make( $request->password),
            
            'is_owner'=>0
        ]);
        $employee->assignRole($request->roles);
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
        $roles = Role::where('guard_name','employee')->pluck('name')->all();
        return view('company.employees.edit', compact('employee','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $employee=Employees::find($id);
        $employee->name=['en'=>$request->english_name,'ar'=>$request->arabic_name,];//$request->name;
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
