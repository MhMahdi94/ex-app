<?php

namespace App\Http\Controllers\Company\Documents;

use App\Http\Controllers\Controller;
use App\Models\AccountLog;
use App\Models\Accounts;
use App\Models\DocumentDetail;
use App\Models\DocumentHeader;
use App\Models\DocumentType;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=DocumentHeader::get();
        return view('company.documents.index',compact('data'));
    }
    public function generatePDF(string $id)
    {
        //$users = Accounts::where('company_id',Auth::guard('employee')->user()->company_id)-> get();
        $header=DocumentHeader::find($id);
        $details=DocumentDetail::where('document_id',$id)->get();
        //return view('company.documents.show', compact('header','details'));
        $data = [
            'title' => 'Document',
            'date' => date('m/d/Y'),
            'header'=>$header,
            'details'=>$details
  //          'data' => $users
        ]; 
        
        return view('company.documents.pdf', $data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $date=Carbon::now()->toDateString();
        $count=DocumentHeader::count();
        $accounts=Accounts::where('company_id',Auth::guard('employee')->user()->id)->get();
        $document_types=DocumentType::get();
        return view('company.documents.create', compact('date','count','accounts','document_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //return $request->all();
        $user=Auth::guard('employee')->user();
        $d=DocumentHeader::create([
            'document_date'=>$request->document_date,
            // 'document_number'=>$request->document_number,
            'document_description'=>$request->description,
            'document_type'=>$request->document_type,
            'document_balance'=>0,//$request->document_date,
            'document_post'=>0,//$request->document_date,
            'company_id'=>$user->company_id,
            'added_by'=>$user->id
        ]);

        foreach ($request->documentDetails as $item) {
            # code...
            DocumentDetail::create([
                'account_no'=>$item['account_no'],
                'amount'=>$item['amount'],
                'currency'=>1,
                'description'=>'',
                'document_id'=>$d->id
            ]);
            AccountLog::create([
                'date'=>Carbon::today()->format('y-m-d'),
                'account_id'=>$item['account_no'],
                'debit'=>$request->document_type=='1'?$item['amount']:0,
                'credit'=>$request->document_type=='1'?0:$item['amount'],
                'desc'=>$request->description,
                'operation'=>$request->document_type=='1'?'2':'3',
                'company_id'=>$user->company_id

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
        $header=DocumentHeader::find($id);
        $details=DocumentDetail::where('document_id',$id)->get();
        return view('company.documents.show', compact('header','details'));
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
