<?php

namespace App\Http\Controllers\Company\AccountStatement;

use App\Http\Controllers\Controller;
use App\Models\AccountLog;
use App\Models\Accounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountStatementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user=Auth::guard('employee')->user();
        $accounts=Accounts::where('company_id',$user->company_id)->get();
         $log=[]; $id=0;
        return view('company.account_statement.index', compact('accounts','log','id'));
    }
    public function list(Request $request)
    {
        //
       // return $request->all();
         $user=Auth::guard('employee')->user();
         $accounts=Accounts::where('company_id',$user->company_id)->get();
         $log=AccountLog::where('account_id',$request->account_id)->get();
       //  return [$request->all(), $accounts, $log];
    //    // return [$employees, $diff];
            $id=$request->account_id;
         return view('company.account_statement.index',compact('accounts','log','id'));
    }
    public function generatePDF(String $id)
    {
       // return $id;
        $user=Auth::guard('employee')->user();
        $accounts=Accounts::where('company_id',$user->company_id)->get();
        $log=AccountLog::where('account_id',$id)->get();
        $total_debit=AccountLog::where('account_id',$id)->sum('debit');
        $total_credit=AccountLog::where('account_id',$id)->sum('credit');
        $data = [
            'title' => __('routes.Account Statement'),
            'date' => date('m/d/Y'),
            'accounts' => $accounts,
            'log'=>$log,
            'total_debit'=>$total_debit,
            'total_credit'=>$total_credit
        ]; 
        return view('company.account_statement.pdf', $data);
       
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
