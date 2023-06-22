<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\custom_fields;
use  App\Models\event_registration;
use  App\Models\registration_section;
use  App\Models\Account;
use  App\Models\Event;
use  App\Models\User;

class registrationController extends Controller
{  
    //custom_feild
    public function data(){

        // $data = event_registration::find(1031);
        // return  view('customfeilds',['reg'=>$data]);
        //for test
        $data = registration_section::find(1011)->getcustom_table;
        return $data;
    }

    //event_registration
    
    public function datq2(){

        $data = custom_fields::find(1012)->regfields;
        // return  view('reg_feilds',['reg1'=>$data]);
        return $data;

    }
}
