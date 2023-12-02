<?php

namespace App\Http\Controllers\Company\Stock;

use App\Http\Controllers\Controller;
use App\Models\StockProduct;
use App\Models\StockProductDetails;
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
        $data=StockProduct::get();
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        StockProduct::create([
            'name'=>$request->name,
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
