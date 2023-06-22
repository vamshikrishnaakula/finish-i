<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
        
    }
    public function account()
    {
        if(auth()->user()->is_super_admin){
            $accounts = Account::latest()->get();
        }else{
            $user = auth()->user();
            $accounts = $user->accounts();
        }
        // dd($accounts);
        return view('admin.select_account',compact('accounts'));
    }
    public function account_set($id)
    {
        session(['account_id' => '$id']);

        return redirect()->route('event_lists');
    }

    public function changePassword()
    {
        return view('admin.change-password');
    }

    public function passwordChange(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = auth()->user();

        if (!\Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password is incorrect.');
        }

        $user->password = bcrypt($request->password);
        $user->save();

        return back()->with('success', 'Password changed successfully.');
    }
}
