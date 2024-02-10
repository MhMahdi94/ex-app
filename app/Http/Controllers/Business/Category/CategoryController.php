<?php

namespace App\Http\Controllers\Business\Category;

use App\Http\Controllers\Controller;
use App\Models\PosCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data= PosCategory::where('company_id',Auth::guard('business')->user()->business_id)->get();
        return view('business.categories.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('business.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        PosCategory::create([
            'name'=>$request->name,
            'company_id'=>Auth::guard('business')->user()->business_id
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
        $category=PosCategory::find($id);
        return view('business.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $category=PosCategory::find($id);
        $category->name=$request->name;
        $category->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        PosCategory::find($id)->delete();
    }
}
