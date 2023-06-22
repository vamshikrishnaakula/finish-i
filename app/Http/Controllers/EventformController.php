<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\custom_fields;
use  App\Models\event_registration;
use  App\Models\registration_section;
use  App\Models\Account;
use  App\Models\Event;
use  App\Models\User;

class EventformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view('welcome');
        // 

        //return "hiii";
        // $data=registration_section::find(1011)->getcustom_table;
        $data=registration_section::all();
        return view('admin.registrationsection.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.eventForm');
        return view('admin.registrationsection.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->is_super_admin){
            return redirect()->back()->with('error','Not an authorized User');
        }
        $this->validate($request, [
            'name' => 'required|min:3|unique:event_categories,name',
        ]);
        $reg_sec = new registration_section;
        $reg_sec -> section_name = $request->name;
        $reg_sec ->save();
        // $save = registration_section::create($request->all());
        return redirect()->route('registrationsection.index')->with('success','Event Category created successfully');
        // return "hwr2";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //return "hwr";
        // return view('admin.registrationsection.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        if(!auth()->user()->is_super_admin){
            return redirect()->back()->with('error','Not an authorized User');
        }
        $category = registration_section::find($id);
    
        return view('admin.registrationsection.edit',['data'=>$category]);
        //return "bye";
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
        //
        if(!auth()->user()->is_super_admin){
            return redirect()->back()->with('error','Not an authorized User');
        }
        $this->validate($request, [
            'name' => 'required|min:3|unique:event_categories,name',
        ]);
        
        $category = registration_section::find($id);
        $category->section_name = $request->name;
        $category->save();
    
        return redirect()->route('registrationsection.index',$id)->with('success','registrationsection updated successfully');
        //return "hi";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(!auth()->user()->is_super_admin){
            return redirect()->back()->with('error','Not an authorized User');
        }
        $category = registration_section::find($id);
        // $category->status = "D";
        $category->destroy($id);
        // $category->save();
        return redirect()->route('registrationsection.index')->with('success','RegistrationSection deleted successfully');

        //return "hello";
    }
}
