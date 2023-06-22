<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registration_section extends Model
{
    use HasFactory;

    protected $table="ifinish_registration_sections";

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function getcustom_table()
    {
        // return $this->hasMany(custom_fields::class);
        return $this->hasMany('App\Models\custom_fields','section_id','id');
    }
}
