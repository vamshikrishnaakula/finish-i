<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Account;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    function __construct()
    {
        //  $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        //  $this->middleware('permission:role-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $roles = Role::with('permissions:permission_name')->orderBy('id','DESC')->paginate(5);
        // dd($roles);
        return view('admin.roles.index',compact('roles'));
    }
    public function show(Request $request)
    {
        // dd($request);
        $roles = Role::with('permissions:permission_name')->orderBy('id','DESC')->paginate(5);
        // dd($roles);
        return view('admin.roles.index',compact('roles'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        // dd($permission);
        return view('admin.roles.create',compact('permission'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $u_id = auth()->user()->id;
        $a_id = Account::where('user_id',$u_id)->first();
        // dd($request->role_name);
        $this->validate($request, [
            'role_name' => 'required|unique:roles,role_name,account_id,0,account_id,'.$a_id->id,
            'permission' => 'required',
        ]);
        // dd('gege');
        $role = Role::create(['role_name' => $request->input('role_name'),'account_id' => $a_id->id,'created_by' => $u_id]);
        $role->permissions()->attach($request->input('permission'));
    
        return redirect()->route('roles.index')->with('success','Role created successfully');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_permissions")->where("role_permissions.role_id",$id)
            ->pluck('role_permissions.permission_id','role_permissions.permission_id')
            ->all();
            // dd($rolePermissions);
    
        return view('admin.roles.edit',compact('role','permission','rolePermissions'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'role_name' => 'required',
            'permission' => 'required',
        ]);
        
        $role = Role::find($id);
        $role->role_name = $request->input('role_name');
        $role->updated_by = auth()->user()->id;
        $role->save();
        $role->permissions()->detach();
        $role->permissions()->attach($request->input('permission'));
    
        return redirect()->route('roles.edit',$id)->with('success','Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $role = Role::find($id);
        $role->status = "D";
        $role->save();
        // DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')->with('success','Role deleted successfully');
    }
    public function activate($id)
    {
        // dd($id);
        $role = Role::find($id);
        $role->status = "A";
        $role->save();
        // DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')->with('success','Role Activated successfully');
    }
    
}
