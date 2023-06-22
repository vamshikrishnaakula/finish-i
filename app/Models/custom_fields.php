<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class custom_fields extends Model
{
    use HasFactory;

    public $table="ifinish_custom_fields";
    
    public $timestamps = false;

    public function registration()
    {
        return $this->belongsTo('App\Models\registration_section','section_id','id');
    }

    public function regfields()
    {
        return $this->hasMany('App\Models\event_registration','custom_field_id');
    }
}
