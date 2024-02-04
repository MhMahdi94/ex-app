<?php

namespace App\Http\Controllers\Company\Payroll;

use App\Http\Controllers\Controller;
use App\Models\API\Attendence;
use App\Models\EmployeeDetails;
use App\Models\Employees;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
//        return request();
        $employees=[];
        return view('company.payroll.index', compact('employees'));
    }
    public function payrollList(Request $request)
    {
        //
        $from=date($request->from);
        $to=date($request->to);
        $from_p = Carbon::parse($from);
        $to_p = Carbon::parse($to);
        $diff=$to_p->diffInDays($from_p);
        $list=Attendence::where('user_id',$request->employee_id)->whereBetween('date',[$from,$to])->get();
        //return [$request->all(), $list];
        // $list=Attendence::where('user_id',$id)->get();
        //$employee=Employees::find($request->employee_id); 
        $employees=Employees::where('company_id', Auth::guard('employee')->user()->company_id)->get();
        foreach ($employees as $employee) {
            # code...
            $employee['check_in']=Attendence::where('check_in','!=',NULL)->count();
            $employee['details']=EmployeeDetails::where('employee_id',$employee->id)->first();
            $employee['current_salary']=($employee->details->salary / $diff) * $employee['check_in'];
            
        }
       // return [$employees, $diff];
        return view('company.payroll.index',compact('employees','list','from','to','diff'));
    }
    public function payrollPdf(Request $request)
    {
        $from=date($request->from);
        $to=date($request->to);
        $from_p = Carbon::parse($from);
        $to_p = Carbon::parse($to);
        $diff=$to_p->diffInDays($from_p);
        $list=Attendence::where('user_id',$request->employee_id)->whereBetween('date',[$from,$to])->get();
        //return [$request->all(), $list];
        // $list=Attendence::where('user_id',$id)->get();
        //$employee=Employees::find($request->employee_id); 
        $employees=Employees::where('company_id', Auth::guard('employee')->user()->company_id)->get();
        foreach ($employees as $employee) {
            # code...
            $employee['check_in']=Attendence::where('check_in','!=',NULL)->count();
            $employee['details']=EmployeeDetails::where('employee_id',$employee->id)->first();
            $employee['current_salary']=($employee->details->salary / $diff) * $employee['check_in'];
            
        }
        $data = [
            'title' => 'Document',
            'date' => date('m/d/Y'),
            //'employee'=>$employee,
            'employees'=>$employees,
            'list'=>$list,
            'from'=>$from,
            'to'=>$to,
            'diff'=>$diff,
  //          'data' => $users
        ]; 
        
        $pdf = Pdf::loadView('company.payroll.payroll_pdf', $data)->setOptions(['defaultFont' => 'sans-serif']);;
        set_time_limit(300);
        return $pdf->download('payroll.pdf');
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
