<?php

namespace App\Http\Controllers\Company\ProfitLoss;

use App\Http\Controllers\Controller;
use App\Models\Expenses;
use App\Models\Revenue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfitLossController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::guard('employee')->user();
        $revenues=Revenue::where('company_id',$user->company_id)->groupBy('account_id')
            ->with('account')
            ->selectRaw('account_id,sum(amount) as total_revenue')
            ->get()
            ;
        $expenses=Expenses::where('company_id',$user->company_id)->groupBy('account_id')
            ->with('account')
            ->selectRaw('account_id,sum(amount) as total_expenses')
            ->get()
            ; 
        $total_revenues=Revenue::where('company_id',$user->company_id)->sum('amount');
        $total_expenses=Expenses::where('company_id',$user->company_id)->sum('amount');
       
        //return $data;
        return view('company.profit_loss.index', compact('revenues','expenses','total_revenues','total_expenses'));
    }
    public function generatePDF()
    {
       // return $id;
        $user=Auth::guard('employee')->user();
        $revenues=Revenue::where('company_id',$user->company_id)->groupBy('account_id')
            ->with('account')
            ->selectRaw('account_id,sum(amount) as total_revenue')
            ->get()
            ;
        $expenses=Expenses::where('company_id',$user->company_id)->groupBy('account_id')
            ->with('account')
            ->selectRaw('account_id,sum(amount) as total_expenses')
            ->get()
            ; 
        $total_revenues=Revenue::where('company_id',$user->company_id)->sum('amount');
        $total_expenses=Expenses::where('company_id',$user->company_id)->sum('amount');
        // $accounts = AccountLog::whereNotIn('account_id', [4, 5])->groupBy('account_id')
        //     ->with('account')
        //     ->selectRaw('account_id,sum(debit) as total_debit, sum(credit) as total_credit')
        //     ->get();
        //     $total_debit = AccountLog::whereNotIn('account_id', [4, 5])->sum('debit');
        //     $total_credit = AccountLog::whereNotIn('account_id', [4, 5])->sum('credit');
        //     $diff=$total_debit-$total_credit;
        // $data = [
        //     'title' => __('routes.Account Statement'),
        //     'date' => date('m/d/Y'),
        //     'accounts' => $accounts,
        //     'total_debit'=>$total_debit,
        //     'total_credit'=>$total_credit,
        //     'diff'=>$diff,
        // ]; 
        return view('company.profit_loss.pdf', compact('revenues','expenses','total_revenues','total_expenses'));
       
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
