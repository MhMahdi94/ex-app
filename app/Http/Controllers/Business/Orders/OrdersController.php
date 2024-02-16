<?php

namespace App\Http\Controllers\Business\Orders;

use App\Http\Controllers\Controller;
use App\Models\PosCategory;
use App\Models\PosClient;
use App\Models\PosProduct;
use App\Models\PosRequest;
use App\Models\PosRequestContent;
use App\Models\PosService;
use Barryvdh\DomPDF\Facade\Pdf;
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
       // return Auth::guard('business')->user();
        $clients=PosClient::get();
        $categories=PosCategory::where('company_id',Auth::guard('business')->user()->business_id)->with('products')->get();
        $products=PosProduct::where('company_id',Auth::guard('business')->user()->business_id)->get();
        $services=PosService::where('business_id',Auth::guard('business')->user()->business_id)->get();
        return view('business.orders.create', compact('clients','products','categories','services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //return $request->all();
        $pos_request=PosRequest::create([
            'client_id'=>$request->client_id
            ,
            'total_order'=>$request->total_order
        ]);
        // foreach ($request->product_id as $item) {
        //     # code...
        //     PosRequestContent::create([
        //         'request_id'=>$pos_request->id,
        //         'product_id'=> $item['product_id'],
        //         'quantity'=> $item['quantity'],
        //     ]);
        // }
        for ($i=0; $i < count($request->product_id); $i++) { 
            # code...
            PosRequestContent::create([
                'request_id'=>$pos_request->id,
                'product_id'=> $request->product_id[$i],
                'quantity'=> $request->quantities[$i],
            ]);
        }
        return redirect()->back();
    }
    public function generatePDF($id)
    {
        $request= PosRequest::find($id);
        $contents= PosRequestContent::where('request_id',$id)->get();
  
        $data = [
            'title' => 'Chart of Accounts',
            'date' => date('m/d/Y'),
            'request' => $request,
            'contents'=>$contents
        ]; 
        
        return view('business.orders.pdf', $data);//->setOptions(['defaultFont' => 'sans-serif']);;
        // set_time_limit(300);
        // return $pdf->download('order.pdf');
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
