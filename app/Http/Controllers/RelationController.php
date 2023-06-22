<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\custom_fields;
use  App\Models\event_registration;
use  App\Models\registration_section;
use  App\Models\Account;
use  App\Models\Event;
use  App\Models\User;

class RelationController extends Controller
{
    public function index()
    {   
       
        //$data=registration_section::with('getcustom_table')->get();
        $data=custom_fields::with('registration')->get();
        return $data;
        // $data = custom_fields::all();

        // return view('relation',['data'=>$data]);
    }
}
