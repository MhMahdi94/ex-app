<?php

namespace App\Http\Controllers\Api;

use App\Models\API\LeaveRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\LeaveCheckResource;
use App\Models\API\SlotLeave;
use App\Models\LeaveSetting;
use Illuminate\Http\Request;

class LeaveCheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return 'hello';
        try {
            //code...
            $data['slots']=LeaveCheckResource::collection(
                LeaveSetting::query()->orderBy('id','asc')->get()
            );
            return $data;
        } catch (\Throwable $th) {
            return $th;
        }
       
        
        // try {
        //     //code...
        //     return LeaveCheckResource::collection(
        //         SlotLeave::query()->orderBy('id','asc')
        //     );
    
        // } catch (\Throwable $th) {
        //     //throw $th;
        //     return $th;
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        try {
            //code...
            return //LeaveCheckResource::collection(
                SlotLeave::query()->orderBy('id','asc')->get();
            //);
    
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        try {
            //code...
            $data=array();
            foreach ($request['leaveSlots'] as $leaveSlot) {
                # code...
                // SlotLeave::query()->where('leave_date',$leaveSlot)->get();
                $value=SlotLeave::query()->where('leave_date',$leaveSlot)->first();
                // if($value==null){
                //     continue;
                // }else{
                    array_push($data,$value);

                // }
    //            $data->push($leaveSlot);
            }
            $response['slots'] = $data;
            return $response;
    
        } catch (\Throwable $th) {
            return $th;
        }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LeaveRequest  $leaveRequest
     * @return \Illuminate\Http\Response
     */
    public function show(LeaveRequest $leaveRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LeaveRequest  $leaveRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(LeaveRequest $leaveRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LeaveRequest  $leaveRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LeaveRequest $leaveRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LeaveRequest  $leaveRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveRequest $leaveRequest)
    {
        //
    }
}
