<?php

namespace App\Http\Controllers\Company\Account;

use App\Http\Controllers\Controller;
use App\Models\COALEVELONE;
use App\Models\COALEVELTWO;
use Illuminate\Http\Request;

class COALEVELONEController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data1=COALEVELONE::get();
        $data=COALEVELTWO::get();
        return view('company.coa.index',compact('data','data1'));
    }

    public function assets()
    {
        //
        $data=COALEVELTWO::where('parent_id',1)->get();
        return view('company.coa.assets',compact('data'));
    }    public function liabilities()
    {
        //
        $data=COALEVELTWO::where('parent_id',2)->get();
        return view('company.coa.liabilities',compact('data'));
    }
    public function equity()
    {
        //
        $data=COALEVELTWO::where('parent_id',3)->get();
        return view('company.coa.equity',compact('data'));
    }
    public function expenses()
    {
        //
        $data=COALEVELTWO::where('parent_id',4)->get();
        return view('company.coa.expenses',compact('data'));
    }
    public function revenue()
    {
        //
        $data=COALEVELTWO::where('parent_id',5)->get();
        return view('company.coa.revenue',compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $accounts=COALEVELONE::get();
        $accounts2=COALEVELTWO::get();
        $collections=$accounts;//->concat($accounts2);
        //return $collections;
        return view('company.coa.create',compact('collections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        COALEVELTWO::create([
            'name'=>$request->name,
            'code'=>$request->code,
            'parent_id'=>$request->parent_id
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return $id;
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
