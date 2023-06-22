<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventType;

class EventTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->is_super_admin){
            return redirect()->back()->with('error','Not an authorized User');
        }
        $types = EventType::latest()->get();
        return view('admin.eventTypes.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.eventTypes.create');
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
            'name' => 'required|min:3|unique:event_types,name',
        ]);

        $save = EventType::create($request->all());
        return redirect()->route('eventtypes.index')->with('success','Event Type created successfully');

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
        $type = EventType::find($id);
    
        return view('admin.eventTypes.edit',compact('type'));
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
        $this->validate($request, [
            'name' => 'required|min:3|unique:event_types,name',
        ]);
        
        $type = EventType::find($id);
        $type->name = $request->input('name');
        $type->save();
    
        return redirect()->route('eventtypes.edit',$id)->with('success','Event Type updated successfully');
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
        $type = EventType::find($id);
        $type->status = "D";
        $type->save();
        return redirect()->route('eventtypes.index')->with('success','Event Type deleted successfully');
    }
    public function activate($id)
    {
        if(!auth()->user()->is_super_admin){
            return redirect()->back()->with('error','Not an authorized User');
        }
        $type = EventType::find($id);
        $type->status = "A";
        $type->save();
        return redirect()->route('eventtypes.index')->with('success','Event Type Activated successfully');
    }
}
