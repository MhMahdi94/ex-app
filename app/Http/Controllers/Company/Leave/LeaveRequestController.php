<?php

namespace App\Http\Controllers\Company\Leave;

use App\Http\Controllers\Controller;
use App\Models\Employees;
use App\Models\FirebaseToken;
use App\Models\LeaveRequset;
use App\Models\Notification;
// use App\Models\API\LeaveRequset;
use Illuminate\Http\Request;

use function App\Helpers\sendNotification;

class LeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=LeaveRequset::with('employee')->get();
        // foreach ($data as $item) {
        //     # code...
        //     $employee=Employees::where('id', $item['employee_id'])->first();
            
        // }
      //  return $data;
        return view('company.leave.index',compact('data'));
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
        
        $leave=LeaveRequset::find($id);
        //return $leave;
        $leave->status=$request->status;
        $leave->save();
        if($request->status==1){
            $token=FirebaseToken::where(['user_id'=>$leave->employee_id, 'guard_name'=>'employee'])->first()->token;
            sendNotification(__('routes.Your leave request has been accepted'),__('routes.Your leave request has been accepted'),$token);
            Notification::create([
                'user_id'=>$leave->employee_id,
                'guard_name'=>'employee',
                'title'=>__('routes.Leave Request'),
                'body'=>__('routes.Your leave request has been accepted'),
            ]);
        }
        if($request->status==2){
            $token=FirebaseToken::where(['user_id'=>$leave->employee_id, 'guard_name'=>'employee'])->first()->token;
            sendNotification(__('routes.Your leave request has been rejected'),__('routes.Your leave request has been rejected'),$token);
            Notification::create([
                'user_id'=>$leave->employee_id,
                'guard_name'=>'employee',
                'title'=>__('routes.Leave Request'),
                'body'=>__('routes.Your leave request has been rejected'),
            ]);
        }
        return response(['success'=>1],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
