<?php

namespace App\Http\Controllers\Business\Product;

use App\Http\Controllers\Controller;
use App\Models\PosCategory;
use App\Models\PosProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data= PosProduct::get() ;
        return view('business.products.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories= PosCategory::get();
        return view('business.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        PosProduct::create([
            'category_id'=>$request->category_id,
            'name'=>$request->name,
            'purchase_price'=>$request->purchase_price,
            'sale_price'=>$request->price_sale,
            'desc'=>$request->description,
            'quantity'=>$request->quantity,
            'image'=>'img',
        ]);
        return redirect()->back() ;
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
        $product =PosProduct::find($id);
        $categories= PosCategory::get();
        return view('business.products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product =PosProduct::find($id);
        $product->category_id=$request->category_id;
        $product->name=$request->name;
        $product->purchase_price=$request->purchase_price;
        $product->sale_price=$request->price_sale;
        $product->quantity=$request->quantity;
        $product->desc=$request->description;
        $product->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        PosProduct::find($id)->delete();
    }
}
