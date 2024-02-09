<?php

namespace App\Http\Controllers\Company\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('permission:create-role|edit-role|delete-role', ['only' => ['index','show']]);
    //     $this->middleware('permission:create-role', ['only' => ['create','store']]);
    //     $this->middleware('permission:edit-role', ['only' => ['edit','update']]);
    //     $this->middleware('permission:delete-role', ['only' => ['destroy']]);
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles=Role::where('guard_name','employee')->orderby('id',)->get();
        return view('company.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $permissions=Permission::where('guard_name','employee')->get();
        return view('company.roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       // return $request->all();
        $role = Role::create(['name' => $request->name, 'guard_name'=>'employee']);

        $permissions = Permission::whereIn('id', $request->permissions)->get(['name'])->toArray();
        
        $role->syncPermissions($permissions);

        return redirect()->route('company.roles.roles_index')
                ->withSuccess('New role is added successfully.');
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
        $role=Role::find($id);
        if($role->name=='Company Owner'){
            abort(403, 'Company Owner ROLE CAN NOT BE EDITED');
        }

        $rolePermissions = DB::table("role_has_permissions")->where("role_id",$role->id)
            ->pluck('permission_id')
            ->all();
        //return  $rolePermissions ;
        return view('company.roles.edit', [
            'role' => $role,
            'permissions' => Permission::get(),
            'rolePermissions' => $rolePermissions
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $input = $request->only('name');
        $role=Role::find($id);
        $role->update($input);

         $permissions = Permission::whereIn('id', $request->permissions)->get(['name'])->toArray();

         $role->syncPermissions($permissions);    
        
        return redirect()->back()
                ->withSuccess('Role is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $role= Role::find($id);
        if($role->name=='Company Owner'){
            abort(403, 'Company Owner ROLE CAN NOT BE DELETED');
        }
        if(auth()->guard('employee')->user()->hasRole($role->name)){
            abort(403, 'CAN NOT DELETE SELF ASSIGNED ROLE');
        }
        $role->delete();
        // return redirect()->route('roles.index')
        //         ->withSuccess('Role is deleted successfully.');
    }
}
