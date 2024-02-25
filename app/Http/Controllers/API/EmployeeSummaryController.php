<?php

namespace App\Http\Controllers\Api;

use App\Models\Summary;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSummaryRequest;
use App\Http\Requests\UpdateSummaryRequest;
use App\Models\API\Attendence;
use App\Models\API\LeaveRequest;
use App\Models\Notification;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeSummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $attendence=Attendence::where("user_id", auth()->user()->id)->count();
        $response['attendence']= $attendence;
//
        $leave=LeaveRequest::where('user_id', auth()->user()->id)->count();
        $response['leave']= $leave;
        
        $response['notifications']= Notification::where(['user_id'=>Auth::id(),'guard_name'=>'employee'])->count();//$leave;
        return response($response,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSummaryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Summary  $summary
     * @return \Illuminate\Http\Response
     */
    public function show(String $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Summary  $summary
     * @return \Illuminate\Http\Response
     */
    public function edit(String $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSummaryRequest  $request
     * @param  \App\Models\Summary  $summary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, String $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Summary  $summary
     * @return \Illuminate\Http\Response
     */
    public function destroy(String $id)
    {
        //
    }
}
