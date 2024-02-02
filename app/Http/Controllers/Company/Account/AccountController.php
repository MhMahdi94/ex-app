<?php

namespace App\Http\Controllers\Company\Account;

use App\Http\Controllers\Controller;
use App\Models\Accounts;
use App\Models\AccountType;
use App\Models\ReportType;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=Accounts::get();
        $data1=[];//COALEVELTWO::get();
        return view('company.coa.index',compact('data','data1'));
    }
    public function assets()
    {
        //
        $data=Accounts::where('account_parent_id',1)->get();
        return view('company.coa.assets',compact('data'));
    }    public function liabilities()
    {
        //
        $data=Accounts::where('account_parent_id',2)->get();
        return view('company.coa.liabilities',compact('data'));
    }
    public function equity()
    {
        //
        $data=Accounts::where('account_parent_id',3)->get();
        return view('company.coa.equity',compact('data'));
    }
   
    public function revenue()
    {
        //
        $data=Accounts::where('account_parent_id',4)->get();
        return view('company.coa.revenue',compact('data'));
    } 
    public function expenses()
    {
        //
        $data=Accounts::where('account_parent_id',5)->get();
        return view('company.coa.expenses',compact('data'));
    }
    public function generatePDF()
    {
        $users = Accounts::get();
  
        $data = [
            'title' => 'Chart of Accounts',
            'date' => date('m/d/Y'),
            'data' => $users
        ]; 
        
        $pdf = Pdf::loadView('company.coa.pdf', $data);
        set_time_limit(300);
        return $pdf->download('accounts.pdf');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $collections=Accounts::get();//$accounts;//->concat($accounts2);
        //return $collections;
        $report_types=ReportType::get();
        $account_types=AccountType::get();
        return view('company.coa.create',compact('collections','report_types','account_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       //  return $request->all();
        Accounts::create([
            
            'account_no'=>$request->account_number,
            'account_parent_id'=>$request->parent_id,
            'account_name'=>$request->name,
            'account_report'=>$request->report_type,
            'account_type'=>$request->account_type,
            'account_level'=>$request->level,
            'account_debit'=>$request->debit,
            'account_credit'=>$request->credit,
            'account_balance'=>$request->balance,
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
