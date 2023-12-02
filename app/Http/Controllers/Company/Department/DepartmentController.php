<?php

namespace App\Http\Controllers\Company\Department;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=Department::where('company_id',Auth::guard('employee')->id())->get();
        return view('company.department.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $employees=Employees::where('company_id',Auth::guard('employee')->id())->get();
        return view('company.department.create',compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Department::create([
            'employee_id'=>$request->employee_id,
            'name'=>$request->name,
            'company_id'=>Auth::guard('employee')->id()
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
        $department=Department::find($id);
        $employees=Employees::where('company_id',Auth::guard('employee')->id())->get();
        return view('company.department.edit',compact('department','employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $department=Department::find($id);
        $department->employee_id=$request->employee_id;
        $department->name=$request->name;
        $department->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $department=Department::find($id);
        $department->delete();
        return response([],200);
    }
}
