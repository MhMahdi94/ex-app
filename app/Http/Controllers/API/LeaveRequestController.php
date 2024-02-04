<?php

namespace App\Http\Controllers\Api;

use App\Models\LeaveRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLeaveRequestRequest;
use App\Http\Requests\UpdateLeaveRequestRequest;
use App\Http\Resources\LeaveRequestResource;
use App\Models\LeaveRequset;
use Illuminate\Support\Facades\Auth;

class LeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=LeaveRequset::query()->where('employee_id',Auth::id())->orderBy('id','asc')->with('getLeaveType')->get();
        return response(compact('data'),200);
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
     * @param  \App\Http\Requests\StoreLeaveRequestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLeaveRequestRequest $request)
    {
        //
        try {
            //code...
           // return $request->all();
            $data=$request->validated();
            $data['employee_id']=Auth::id();
            $leave_request=LeaveRequset::create($data);//LeaveRequest::create($data);
            
            return response(compact('leave_request'),201);
    
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
    public function show(LeaveRequset $leaveRequest)
    {
        //
        return $leaveRequest;
        // LeaveRequestResource::collection(
        //     LeaveRequest::query()->where('user_id',$leaveRequest['user_id'])->orderBy('id','asc')->paginate(10)
        // );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LeaveRequest  $leaveRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(LeaveRequset $leaveRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLeaveRequestRequest  $request
     * @param  \App\Models\LeaveRequest  $leaveRequest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLeaveRequestRequest $request, LeaveRequset $leaveRequest)
    {
        //
        try {
            //code...
            $data=$request->validated();
            $d=LeaveRequset::query()->where('id',$leaveRequest['id'])->update([
                'status'=>$data['status'],
            ]);

        //   $leaveRequest->update($data);
          return $leaveRequest;
        } catch (\Throwable $th) {
            return $th;
        }
          //code...
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LeaveRequest  $leaveRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveRequset $leaveRequest)
    {
        //
    }
}
