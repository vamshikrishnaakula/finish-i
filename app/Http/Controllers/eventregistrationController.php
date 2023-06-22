<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\custom_fields;
use  App\Models\event_registration;
use  App\Models\registration_section;
use  App\Models\Account;
use  App\Models\Event;
use Illuminate\Validation\Rule;
use  App\Models\User;
use Illuminate\Support\Facades\DB;

class eventregistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=event_registration::all();
        // return $data;
        return view('admin.eventregistration.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $data=custom_fields::all();
        $cand = Event::all();
        return view('admin.eventregistration.create',['data'=>$data,'cand'=>$cand]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Validation\Validator
     */
    public function store(Request $request)
    {
        if(!auth()->user()->is_super_admin){
            return redirect()->back()->with('error','Not an authorized User');
        }
        $validatedData =[
            'Event_ID' => 'required',
            'Order' => 'required',
            'RaceID' =>'required|min:3',
            'Fieldstatus' =>'required|numeric|min:3',
            'customFields' => 'required|unique:ifinish_event_registration_fields,custom_field_id,,id,event_id,'.$request->Event_ID];
            
    
        // $check = DB::table('ifinish_event_registration_fields')
        //     ->where('event_id', $request->Event_ID)
        //     ->where('custom_field_id', $request->customFields)
        //     ->first();
    
        // if ($check) {
        //     return back()->withErrors(['message' => 'The combination of Event_ID and customFields must be unique.']);
            
        // }
        $custom_message =[ 'customFields.unique' => 'The combination of Event_ID and customFields must be unique.',
                           'Order.required' => 'We need to know your Order!',
                           'RaceID.required' => 'We need to know your RaceID!',
                           'RaceID.min' => 'fill minimum 3 characters',
                           'Fieldstatus.min' => 'fill minimum 3 characters',
                           'Fieldstatus.required' => 'We need to know your Fieldstatus!'];
        // $messages = array(
        //     'Order.required' => 'We need to know your Order!',
        // );

        $this->validate($request,$validatedData,$custom_message );

        $cand = new event_registration;
        $cand -> event_id = $request->Event_ID;
        $cand -> custom_field_id = $request->customFields;
        $cand -> order = $request->Order;
        $cand -> field_status = $request->Fieldstatus;
        $cand -> help_content = $request->HelpContent;
        $cand -> race_id= $request->RaceID;
        $cand ->save();
        //$save = registration_section::create($request->all());
        return redirect()->route('eventregistration.index')->with('success','Event Category created successfully');

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

        $data=custom_fields::all();
        $cand = Event::all();
        $category = event_registration::find($id);
    
        return view('admin.eventregistration.edit',['data'=>$category,'dat'=>$data,'cand'=>$cand]);

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
        
        $validatedData =[
            'Event_ID' => 'required',
            'Order' => 'required',
            'RaceID' =>'required|min:3',
            'Fieldstatus' =>'required|numeric|min:2',
            'customFields' => 'required|unique:ifinish_event_registration_fields,custom_field_id,,id,event_id,'.$request->Event_ID];
        
            $custom_message =[ 'customFields.unique' => 'The combination of Event_ID and customFields must be unique.',
            'Order.required' => 'We need to know your Order!',
            'RaceID.required' => 'We need to know your RaceID!',
            'RaceID.min' => 'fill minimum 3 characters',
            'Fieldstatus.min' => 'fill minimum 3 characters',
            'Fieldstatus.required' => 'We need to know your Fieldstatus!'];

        $this->validate($request,$validatedData,$custom_message );
        
        $cand = event_registration::find($id);
        $cand -> event_id = $request->Event_ID;
        $cand -> custom_field_id = $request->customFields;
        $cand -> order = $request->Order;
        $cand -> field_status = $request->Feildstatus;
        $cand -> help_content = $request->HelpContent;
        $cand -> race_id= $request->RaceID;
        $cand ->save();
    
        return redirect()->route('eventregistration.index',$id)->with('success','registrationsection updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->is_super_admin){
            return redirect()->back()->with('error','Not an authorized User');
        }
        $category = event_registration::find($id);
        // $category->status = "D";
        $category->destroy($id);
        // $category->save();
        return redirect()->route('eventregistration.index')->with('success','RegistrationSection deleted successfully');

    }
}
