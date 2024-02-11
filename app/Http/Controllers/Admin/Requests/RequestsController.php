<?php

namespace App\Http\Controllers\Admin\Requests;

use App\Http\Controllers\Controller;
use App\Models\NewRequest;
use App\Models\Package;
use App\Models\Request ;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=NewRequest::get();
        return view('admin.requests.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $data=NewRequest::find($id);
        $data['status']='1';
        $data->save();
        return response([$data, $id],200);
        // $data=$request->validated();
        // $data['status']=true;
        // $newRequest->update($data);
        // return new NewRequestResource($newRequest);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
