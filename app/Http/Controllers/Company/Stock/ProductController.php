<?php

namespace App\Http\Controllers\Company\Stock;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\StockLog;
use App\Models\StockOperation;
use App\Models\StockProduct;
use App\Models\StockProductDetails;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=StockProduct::where('company_id', Auth::guard('employee')->user()->company_id)
        ->get();
        return view('company.products.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('company.products.create');
    }

    public function importExport(string $id){
        $opertions=StockOperation::where('id','!=','1')->get();
        $product=StockProduct::find($id);
        $currencies= Currency::where('company_id',Auth::guard('employee')->user()->company_id)->get();
        return view('company.products.import_export',compact('opertions','product','currencies'));
    }
    public function importExportUpdate(Request $request){
        
        $product=StockProduct::find($request->product_id);
        $quantity=0;
        if($request->operation_id == "2"){
            $quantity=$request->quantity + $product->quantity;
            $product->price=$product->price+$request->price_usd;
        }

        if($request->operation_id == '3'){
            $quantity= $product->quantity-$request->quantity ;
            $product->price=$product->price-$request->price_usd;
        }
        $product->quantity=$quantity;
        
        $product->save();

        StockLog::create([
            'operation_id'=>$request->operation_id,
            'product_id'=>$request->product_id,
            'quantity'=>$request->quantity,
            'date'=>Carbon::today()->format('Y-m-d'),
            'user_id'=>Auth::guard('employee')->id(),
            'price'=>$request->price,
            'currency_id'=>$request->currency_id
        ]);
       return redirect()->back();//[$request->all(), $product, $quantity];
    }

    public function generatePDF()
    {
        //$users = Accounts::get();
        $log=StockLog::get();
        $data = [
            'title' => 'Chart of Accounts',
            'date' => date('m/d/Y'),
            'data' => $log
        ]; 
        
        return view('company.products.pdf', $data);
       // set_time_limit(300);
        //return $pdf->download('report.pdf');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $product=StockProduct::create([
            'name'=>$request->name,
            'price'=>0,
            'company_id'=>Auth::guard('employee')->user()->company_id,
        ]);
        StockLog::create([
            'operation_id'=>1,
            'product_id'=>$product->id,
            'quantity'=>0,
            'price'=>0,
            'currency_id'=>1,
            'date'=>Carbon::today()->format('Y-m-d'),
            'user_id'=>Auth::guard('employee')->id()
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
        $product=StockProduct::find($id);
        $q= $request->operation_id==0?($request->quantity+$request->current_quantity):($request->current_quantity-$request->quantity);
        
        $product->quantity=$q;
        $product->save();

        StockProductDetails::create([
            'stock_product_id'=>$id,
            'quantity'=>$request->quantity,
            'employee_id'=>Auth::guard('employee')->id(),
            'operation_id'=>$request->operation_id,

        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
