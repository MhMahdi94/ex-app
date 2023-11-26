<?php

namespace App\Http\Controllers\Admin\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=Admin::get();
        return view('admin.admins.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            //code...
            Admin::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'mobile_no'=>$request->mobile_no,
                'password'=>$request->password
            ]);
            
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
        
       
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
        $admin=Admin::find($id);
        return view('admin.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            //code...
            $admin=Admin::find($id);
            $admin->name=$request->name;
            $admin->email=$request->email;
            $admin->mobile_no=$request->mobile_no;
            $admin->save();
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th;
        }
       

       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
