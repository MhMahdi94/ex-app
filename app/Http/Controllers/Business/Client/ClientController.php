<?php

namespace App\Http\Controllers\Business\Client;

use App\Http\Controllers\Controller;
use App\Models\PosClient;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=PosClient::get();
        return view('business.clients.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('business.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       
        PosClient::create([
            'name'=>$request->name,
            'mobile_no'=>$request->mobile_no,
            'email'=>$request->email,
            'address'=>$request->address,
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
        $client=PosClient::find($id);
        return view('business.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $client=PosClient::find($id);
        $client->name=$request->name;
        $client->email=$request->email;
        $client->mobile_no=$request->mobile_no;
        $client->address=$request->address;
        $client->save();
        return redirect()->back() ;
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        PosClient::find($id)->delete();
    }
}
