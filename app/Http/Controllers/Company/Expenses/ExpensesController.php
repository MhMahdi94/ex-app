<?php

namespace App\Http\Controllers\Company\Expenses;

use App\Http\Controllers\Controller;
use App\Models\Accounts;
use App\Models\Expenses;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpensesController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $expenses=Expenses::where('company_id',Auth::guard('employee')->user()->company_id)->get();
        return view('company.expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $accounts=Accounts::where(['company_id'=>Auth::guard('employee')->user()->company_id,'account_parent_id'=>'5'])->get();
       // return $accounts;
        return view('company.expenses.create', compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       // return $request->all(); 
        Expenses::create(
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
        $expense=Expenses::find($id);
        $accounts=Accounts::where(['company_id'=>Auth::guard('employee')->user()->company_id,'account_parent_id'=>'4'])->get();
       
        return view('company.expenses.edit', compact('accounts','expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        Expenses::find($id)->update($request->all());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Expenses::find($id)->delete();
        return response(['success'=>1],200);
    }
}
