<?php

namespace App\Http\Controllers\Admin\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Flasher\Toastr\Laravel\Facade\Toastr as FacadeToastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Yoeunes\Toastr\Facades\Toastr;

use function PHPUnit\Framework\isEmpty;

class AdminsController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    
    public function index(Request $request)
    {
        //
       
        $data=Admin::get();
        $user = Admin::find(Auth::guard('admin')->user()->id);
       // dd($user->hasPermissionTo('create-admin'));
        return view('admin.admins.index',compact('data','user'));
    }
    public function search(Request $request)
    {
        //
        $data=Admin::where('email','LIKE',$request['query'])->orWhere('mobile_no','LIKE',$request['query'])-> get();
      
        $user = Admin::find(Auth::guard('admin')->user()->id);
       // dd($user->hasPermissionTo('create-admin'));
        return view('admin.admins.index',compact('data','user'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
       // $roles=Role::where('guard_name','admin')->get();
       Toastr::success('Data has been saved successfully!');
        return view('admin.admins.create',
        [
            'roles' => Role::where('guard_name','admin')->pluck('name')->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //return $request->all();
        try {
            //code...
            $admin=Admin::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'mobile_no'=>$request->mobile_no,
                'password'=>$request->password
            ]);
            $admin->assignRole($request->roles);
            //flash()->addSuccess('Your account has been re-verified.');
            toastr()->success('Data has been saved successfully!');
            return redirect(route('admin.admins.admins_index'));
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
            toastr()->success('Data has been saved successfully!');
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
        Admin::find($id)->delete();
    }
}
