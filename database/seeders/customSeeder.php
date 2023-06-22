<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class customSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
       
        // DB::table('ifinish_registration_sections')->insert([
        //     'id' => '1014',
        //     'section_name' => 'wwdd',
        // ]);



        // DB::table('ifinish_custom_fields')->insert([
        //     'id' => '1014',
        //     'field_name' => 'wwew',
        //     'label_name' => 'ddd',
        //     'options' => 'ml',
        //     'section_id' => '1012',
        // ]);


        DB::table('ifinish_event_registration_fields')->insert([
            'id' => '1013',
            'event_id' => '0',
            'custom_feild_id' => '1014',
            'order' => 'm2',
            'field_status' => 'wwww',
            'help_content' => 'wwww',
            'race_id' => 'wwwww',
        ]);
    }
}
