<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventCategory;

class EventCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = EventCategory::latest()->get();
        return view('admin.eventCategory.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.eventCategory.create');
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

        $save = EventCategory::create($request->all());
        return redirect()->route('eventcategories.index')->with('success','Event Category created successfully');

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
        $category = EventCategory::find($id);
    
        return view('admin.eventCategory.edit',compact('category'));
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
            'name' => 'required|min:3|unique:event_categories,name',
        ]);
        
        $category = EventCategory::find($id);
        $category->name = $request->input('name');
        $category->save();
    
        return redirect()->route('eventcategories.edit',$id)->with('success','Event Category updated successfully');
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
        $category = EventCategory::find($id);
        $category->status = "D";
        $category->save();
        return redirect()->route('eventcategories.index')->with('success','Event Category deleted successfully');
    }
    public function activate($id)
    {
        if(!auth()->user()->is_super_admin){
            return redirect()->back()->with('error','Not an authorized User');
        }
        $category = EventCategory::find($id);
        $category->status = "A";
        $category->save();
        return redirect()->route('eventcategories.index')->with('success','Event Category Activated successfully');
    }
}
