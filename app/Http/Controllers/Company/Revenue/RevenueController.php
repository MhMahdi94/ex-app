<?php

namespace App\Http\Controllers\Company\Revenue;

use App\Http\Controllers\Controller;
use App\Models\Accounts;
use App\Models\Revenue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RevenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $revenues=Revenue::where('company_id',Auth::guard('employee')->user()->company_id)->get();
        return view('company.revenue.index', compact('revenues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $accounts=Accounts::where(['company_id'=>Auth::guard('employee')->user()->company_id,'account_parent_id'=>'4'])->get();
       // return $accounts;
        return view('company.revenue.create', compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
        Revenue::create(
            [
                'desc'=>$request->desc,
                'amount'=>$request->amount,
                'account_id'=>$request->account_id,
                'date'=>Carbon::today()->format('y-m-d'),
                'company_id'=>Auth::guard('employee')->user()->company_id
            ]
        );
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
        $revenue=Revenue::find($id);
        $accounts=Accounts::where(['company_id'=>Auth::guard('employee')->user()->company_id,'account_parent_id'=>'4'])->get();
       
        return view('company.revenue.edit', compact('accounts','revenue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        Revenue::find($id)->update($request->all());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Revenue::find($id)->delete();
        return response(['success'=>1],200);
    }
}
