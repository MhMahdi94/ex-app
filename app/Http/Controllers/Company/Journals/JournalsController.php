<?php

namespace App\Http\Controllers\Company\Journals;

use App\Http\Controllers\Controller;
use App\Models\Accounts;
use App\Models\JournalDetail;
use App\Models\JournalHeader;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JournalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=JournalHeader::where('company_id',Auth::guard('employee')->user()->company_id)->get();
        return view('company.journals.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data=[];
        $date=Carbon::now()->toDateString();
        $count=JournalHeader::count();
        $accounts=Accounts::where('account_level','!=','1')->get();
        return view('company.journals.create', compact('data','date','count','accounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       // return $request->all();
        $user=Auth::guard('employee')->user();
        $j=JournalHeader::create([
            'journal_date'=>$request->journal_date,
            'journal_description'=>$request->description,
            'journal_type'=>1,//$request->journal_date,
            'journal_report'=>0,//$request->journal_date, 
            'total_debit'=>0,//$request->debit, 
            'total_credit'=>0,//$request->credit, 
            'balance'=>0,//$request->journal_date, 
            'company_id'=>$user->company_id,
            'added_by'=>$user->id
        ]);
        JournalHeader::latest()->first();
       // return $j;
        foreach ($request->journalDetails as $item) {
            # code...
            JournalDetail::create([
                'journal_account_no'=>$item['account_no'],
                'journal_debit'=>$item['debit'],
                'journal_credit'=>$item['credit'],
                'journal_description'=>$item['descriprtion'],
                'currency'=>1,
                'journal_no'=>$j->id,
            ]);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        
        $header=JournalHeader::find($id);
        $details=JournalDetail::where('journal_no',$id)->get();
        return view('company.journals.show', compact('header','details'));
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
