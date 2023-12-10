<?php

namespace App\Http\Controllers\Company\FinancialYear;

use App\Http\Controllers\Controller;
use App\Models\FinancialCalendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinancialYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=FinancialCalendar::select('*')->orderby('financial_year','desc')->paginate(10);
        return view('company.financial_calendar.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('company.financial_calendar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //return $request->all();
        FinancialCalendar::create([
            'financial_year'=>$request->finance_year,
            'financial_desc'=>$request->desc,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'added_by'=>Auth::guard('employee')->id(),
            'updated_by'=>Auth::guard('employee')->id(),
            'company_id'=>Auth::guard('employee')->user()->company_id
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
