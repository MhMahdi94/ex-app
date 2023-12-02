<?php

namespace App\Http\Controllers\Company\Leave;

use App\Http\Controllers\Controller;
use App\Models\LeaveSetting;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class LeaveSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('company.leave_settings.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('company.leave_settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $startDate = Carbon::createFromFormat('Y-m-d', $request->from)->toDateString();
        $endDate = Carbon::createFromFormat('Y-m-d', $request->to)->toDateString();
  
        $dateRange = CarbonPeriod::create($startDate, $endDate);
        $dateRange_f=array();
        foreach ($dateRange as $date) {
            LeaveSetting::updateOrcreate(['date'=>$date->format('Y-m-d')],[
                'date'=>$date->format('Y-m-d'),
                'status'=>$request->status
            ]);
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
