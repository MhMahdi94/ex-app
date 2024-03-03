<?php

namespace App\Http\Controllers\Business\Invoice;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\PosClient;
use App\Models\PosService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $invoices=Invoice::where('company_id',Auth::guard('business')->user()->business_id)->get();
        return view('business.invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $clients=PosClient::where('company_id',Auth::guard('business')->user()->business_id)->get();
        $services=PosService::where('business_id',Auth::guard('business')->user()->business_id)->get();
        $invoice_count=Invoice::where('company_id',Auth::guard('business')->user()->business_id)->count();
        $invoice_date=date('Y-M-d');
        //return $services;
        return view('business.invoices.create',compact('clients','services','invoice_count','invoice_date'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //return $request->all();
        $invoice=Invoice::create([
            'client_id'=>$request->client_id,
            'service_id'=>$request->service_id,
            'price'=>$request->price,
            'company_id'=>Auth::guard('business')->user()->business_id,
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
        $clients=PosClient::where('company_id',Auth::guard('business')->user()->business_id)->get();
        $services=PosService::where('business_id',Auth::guard('business')->user()->business_id)->get();
        $invoice_count=Invoice::where('company_id',Auth::guard('business')->user()->business_id)->count();
        $invoice_date=date('Y-M-d');
        $invoice=Invoice::find($id);
        return view('business.invoices.edit', compact('invoice','clients','services','invoice_count','invoice_date'));
    }
    public function pdf(string $id)
    {
        //
        $clients=PosClient::where('company_id',Auth::guard('business')->user()->business_id)->get();
        $services=PosService::where('business_id',Auth::guard('business')->user()->business_id)->get();
        $invoice_count=Invoice::where('company_id',Auth::guard('business')->user()->business_id)->count();
        $invoice_date=date('Y-M-d');
        $invoice=Invoice::find($id);
        return view('business.invoices.pdf', compact('invoice','clients','services','invoice_count','invoice_date'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $invoice=Invoice::find($id);
        $invoice->client_id=$request->client_id;
        $invoice->service_id=$request->service_id;
        $invoice->price=$request->price;
        $invoice->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        
        Invoice::find($id)->delete();
        return $id;
    }
}
