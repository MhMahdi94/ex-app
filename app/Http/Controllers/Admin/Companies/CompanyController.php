<?php

namespace App\Http\Controllers\Admin\Companies;

use App\Http\Controllers\Controller;
use App\Models\Accounts;
use App\Models\Company;
use App\Models\Employees;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Company::get();
        return view('admin.companies.index', compact('data'));
    }
    public function search(Request $request)
    {
        //
        $data=Company::where('email','LIKE',$request['query'])-> get();
      
        
       // dd($user->hasPermissionTo('create-admin'));
        return view('admin.companies.index',compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $owners=Employees::where('is_owner',1)->get();
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // return $request->all();
        $company = Company::create(
            [
                'name' => ['en' => $request->english_name, 'ar' => $request->arabic_name,],
                'owner_id' => $request->owner_id,
                'email' => $request->email,
                'description' => $request->description,
                'noOfDept' => $request->noOfDept,
                'noOfEmployee' => $request->noOfEmployee,
                //'mobile_no'=>$request->mobile_no,
                'subscriptionStart' => $request->subscriptionStart,
                'subscriptionEnd' => $request->subscriptionEnd,
            ]
        );
        //init accounts
        Accounts::create(['account_no'=>1, 
            'account_parent_id'=>0, 
            'account_name'=>'Assets', 
            'account_type'=>1, 
            'account_report'=>1, 
            'account_level'=>0,
            'account_debit'=>0,
            'account_credit'=>0,
            'account_balance' => 0,
            'company_id'=>$company->id, 
            
        ]);
        Accounts::create(['account_no'=>2, 
            'account_parent_id'=>0, 
            'account_name'=>'Liabilities', 
            'account_type'=>1, 
            'account_report'=>1, 
            'account_level'=>0,
            'account_debit'=>0,
            'account_credit'=>0,
            'account_balance' => 0,
            'company_id'=>$company->id, 
            
        ]);
        Accounts::create(['account_no'=>3, 
            'account_parent_id'=>0, 
            'account_name'=>'Equity', 
            'account_type'=>1, 
            'account_report'=>1, 
            'account_level'=>0,
            'account_debit'=>0,
            'account_credit'=>0,
            'account_balance' => 0,
            'company_id'=>$company->id, 

            
        ]);
        Accounts::create(['account_no'=>4, 
            'account_parent_id'=>0, 
            'account_name'=>'Revenue', 
            'account_type'=>1, 
            'account_report'=>2, 
            'account_level'=>0,
            'account_debit'=>0,
            'account_credit'=>0,
            'account_balance' => 0,
            'company_id'=>$company->id, 
        ]);
        Accounts::create(['account_no'=>5, 
            'account_parent_id'=>0, 
            'account_name'=>'Expenses', 
            'account_type'=>1, 
            'account_report'=>2, 
            'account_level'=>0,
            'account_debit'=>0,
            'account_credit'=>0,
            'account_balance' => 0,
            'company_id'=>$company->id, 
            
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
        Company::find($id)->delete();
    }
}
