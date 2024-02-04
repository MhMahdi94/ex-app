<?php

namespace App\Http\Controllers\Admin\Attendence;

use App\Http\Controllers\Controller;
use App\Models\API\Attendence;
use App\Models\DocumentDetail;
use App\Models\DocumentHeader;
use App\Models\Employees;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $list=[];
        $employee=null;
        $employees=Employees::where('company_id', Auth::guard('employee')->user()->company_id)->get();
        return view('company.attendence.index',compact('employees','list','employee'));
    }
    public function attendenceList(Request $request)
    {
        //
        $from=date($request->from);
        $to=date($request->to);
        $list=Attendence::where('user_id',$request->employee_id)->whereBetween('date',[$from,$to])->get();
        //return [$request->all(), $list];
        // $list=Attendence::where('user_id',$id)->get();
        $employee=Employees::find($request->employee_id); 
        $employees=Employees::where('company_id', Auth::guard('employee')->user()->company_id)->get();
         return view('company.attendence.index',compact('employees','list','employee','from','to'));
    }

    public function attendencePdf(Request $request)
    {
        //return $request->all();
        $from=date($request->from);
        $to=date($request->to);
        $list=Attendence::where('user_id',$request->employee_id)->whereBetween('date',[$from,$to])->get();
        //return [$request->all(), $list];
        // $list=Attendence::where('user_id',$id)->get();
        $employee=Employees::find($request->employee_id); 
        $employees=Employees::where('company_id', Auth::guard('employee')->user()->company_id)->get();
        $data = [
            'title' => 'Document',
            'date' => date('m/d/Y'),
            'employee'=>$employee,
            'employees'=>$employees,
            'list'=>$list
  //          'data' => $users
        ]; 
        
        $pdf = Pdf::loadView('company.attendence.attendence_pdf', $data)->setOptions(['defaultFont' => 'sans-serif']);;
        set_time_limit(300);
        return $pdf->download('attendence.pdf');
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
