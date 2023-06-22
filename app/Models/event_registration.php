<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event_registration extends Model
{
    use HasFactory;

    protected $table="ifinish_event_registration_fields";

    public $timestamps = false;

    public function custom()
    {
        return $this->belongsTo('App\Models\custom_fields');
    }
}
