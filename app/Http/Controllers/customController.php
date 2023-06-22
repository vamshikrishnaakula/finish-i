<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\custom_fields;
use  App\Models\event_registration;
use  App\Models\registration_section;
use  App\Models\Account;
use  App\Models\Event;
use  App\Models\User;

class customController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $data=custom_fields::all();
        return view('admin.customfeilds.index',['customdata'=>$data]);
        // return "Hiii";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=registration_section::all();
        return view('admin.customfeilds.create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        //print_r($request->all());
        if(!auth()->user()->is_super_admin){
            return redirect()->back()->with('error','Not an authorized User');
        } 
        
        $request->validate([
            'fieldname' => 'required',
            'labelname' =>'required',
            'labelname' =>'required|unique:ifinish_custom_fields,label_name',
            'Input' =>'required|not_in:0',
            'role' =>'required',
            //'options' =>'required|not_in:0',
        ]);
        $user = new custom_fields;
        $user -> field_name = $request->fieldname;
        $user -> label_name = $request->labelname;
        $user -> section_id = $request->role;
        $data =  $request->Input;
        $user -> InputType = $data;
        $d = json_encode($request->options);
        $user -> options =  $d;
        $user ->save();
        return redirect()->route('customfeilds.index')->with('success','custom feilds created successfully');
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
        return "wru";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!auth()->user()->is_super_admin){
            return redirect()->back()->with('error','Not an authorized User');
        }
        $category = custom_fields::find($id);
        $relation=  custom_fields::with('registration')->get();
        $data = registration_section::all();

        //print_r(json_encode($category->options));exit;
        // return $relation;
        return view('admin.customfeilds.edit',['data'=>$category,'cat'=>$data,'relation'=>$relation]);
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
        if(!auth()->user()->is_super_admin){
            return redirect()->back()->with('error','Not an authorized User');
        }
        $request->validate([
            'fieldname' => 'required',
            'labelname' =>'required',
            //'labelname' =>'required|unique:ifinish_custom_fields,label_name',
            'Input' =>'required|not_in:0',
            'role' =>'required',
        ]);
        $user = custom_fields::find($id);
        $user -> field_name = $request->fieldname;
        $user -> label_name = $request->labelname;
        $user -> section_id = $request->role;
        $data =  $request->Input;
        $user -> InputType = $data;
        $d = json_encode($request->opt);
        $user -> options =  $d;
        //$user->options = $user->options->push('new_option');
        $user ->save();
        return redirect()->route('customfeilds.index',$id)->with('success','customfeilds updated successfully');
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
        $category = custom_fields::find($id);
        // $category->status = "D";
        $category->destroy($id);
        // $category->save();
        return redirect()->route('customfeilds.index')->with('success','customfeilds deleted successfully');

    }
}
