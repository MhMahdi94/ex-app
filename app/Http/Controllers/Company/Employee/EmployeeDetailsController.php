<?php

namespace App\Http\Controllers\Company\Employee;

use App\Http\Controllers\Controller;
use App\Models\Allowence;
use App\Models\EmployeeDetails;
use Illuminate\Http\Request;

class EmployeeDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
      //return $request->all();
        EmployeeDetails::updateOrCreate(['employee_id'=> $request->employee_id],[
            'employee_id'=>$request->employee_id,
            'dept_id'=>$request->dept_id,
            'salary'=>$request->salary,
            'jobTitle'=>$request->jobTitle,
            'jobType'=>$request->job_type,
        ]);
        foreach ($request->allowenceFields as $field) {
            # code...
           // return $field['all_val'];
        //    $all=new Allowence();
        //    $all->employee_id=$request->employee_id;
        //    $all->allName=$field['all_name'];
        //    $all->allVal=$field['all_val'];
        //    $all->save();
            Allowence::updateOrCreate(
                ['employee_id'=>$request->employee_id, 'id'=>$field['id']],
                [
                    
                    'employee_id'=>$request->employee_id,
                    'allName'=>$field['all_name'],
                    'allVal'=>$field['all_val']
                ]
            );
        }
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
