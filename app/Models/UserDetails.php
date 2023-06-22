<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

Use App\Models\User;

class UserDetails extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'gender',
        'mobile_number',
        'country_code',
        'date_of_birth',
        'address',
        'landmark',
        'area',
        'state',
        'city',
        'country',
        'pincode',
        'profile_image',
        'nationality',
        'blood_group',
        'creation_date',
        'creation_ip',
        'created_by',
        'updated_date',
        'updated_ip',
        'updated_by',
        'status',
    ];

    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
