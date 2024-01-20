<?php

namespace App\Http\Controllers\Business\Services;

use App\Http\Controllers\Controller;
use App\Models\PosService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data= PosService::get();
        return view('business.services.index', compact('data')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('business.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        PosService::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'business_id'=>Auth::guard('business')->user()->business_id,
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
        $service=PosService::find($id);
        return view('business.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $service=PosService::find($id);
        $service->name=$request->name;
        $service->description=$request->description;
        $service->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        PosService::find($id)->delete();
    }
}
