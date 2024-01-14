<?php

namespace App\Http\Controllers\Business\Orders;

use App\Http\Controllers\Controller;
use App\Models\PosClient;
use App\Models\PosProduct;
use App\Models\PosRequest;
use App\Models\PosRequestContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=PosRequest::get();
        return view('business.orders.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $clients=PosClient::get();
        $products=PosProduct::where('company_id',Auth::guard('business')->user()->business_id)->get();
        return view('business.orders.create', compact('clients','products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       // return $request->all();
        $pos_request=PosRequest::create([
            'client_id'=>$request->client_id
        ]);
        foreach ($request->details as $item) {
            # code...
            PosRequestContent::create([
                'request_id'=>$pos_request->id,
                'product_id'=> $item['product_id'],
                'quantity'=> $item['quantity'],
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
        $request= PosRequest::find($id);
        $contents= PosRequestContent::where('request_id',$id)->get();
        return view('business.orders.details', compact('request','contents'));
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
