<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Role;
use App\Models\Account;
use App\Models\UserDetails;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // dd('asdbj');
        // $data = Account::where('created_by',auth()->user()->id)->orderBy('id','DESC')->pluck('id')->toArray();
        // dd($data);
        $data = User::orderBy('id','DESC')->get();
        // dd($users);
        return view('admin.users.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        // if ($error = $this->checkPermission('user-create'))
        // {
        //     return redirect()->back()->withErrors($error);
        // }
        if(auth()->user()->is_super_admin)
        {
            
        }else{
        }
        $roles = Role::where('status','A')->get();
        // dd($roles);
        return view('admin.users.create',compact('roles'));
    }

    public function store(Request $request)
    {
        // if ($error = $this->checkPermission('user-create') && !(auth()->user()->is_super_admin))
        // {
        //     return redirect()->back()->withErrors($error);
        // }
        $this->validate($request, [
            'company_name' => 'required',
            'name' => 'required',
            'mobile_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|same:confirm_password',
            'role' => 'required'
        ]);
        $input_user['name']=$request->input('name');
        $input_user['email']=$request->input('email');
        $input_user['password']=Hash::make($request->input('password'));
        $user = User::create($input_user);

        $input['user_id'] = $user->id;
        $input['created_by'] = auth()->user()->id;
        $input['creation_ip'] = $request->ip();

        $input_company = $input;
        $input_company['company_name'] = $request->input('company_name');
        $account = Account::create($input_company);
        
        $input_details = $input;
        $input_details['first_name'] = $request->input('name');
        $input_details['mobile_number'] = $request->input('mobile_number');
        $details = UserDetails::create($input_details);

        $input = $request->all();
    
        
        $user->accounts()->attach($account->id,['role_id' => $request->input('role'),'created_by' => auth()->user()->id,'creation_ip' => $request->ip()]);
    
        return redirect()->route('users.index')->with('success','User created successfully');
    }


    public function edit($id)
    {
        if ($error = $this->checkPermission('user-edit'))
        {
            return redirect()->back()->withErrors($error);
        }
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('users.edit',compact('user','roles','userRole'));
    }

    public function update(Request $request, $id)
    {
        if ($error = $this->checkPermission('user-edit'))
        {
            return redirect()->back()->withErrors($error);
        }
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')->with('success','User updated successfully');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->with('success','User deleted successfully');
    }

    private function checkPermission($permission)
    {
        if (auth()->user()->cannot($permission))
        {
            return ["you are not authorised"];
        }
        return false;
    }
}
