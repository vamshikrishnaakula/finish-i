<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

Use App\Models\User;

class Account extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
            'user_id',
            'company_name',
            'company_email_id',
            'company_contact_no',
            'country_code',
            'company_address',
            'landmark',
            'state',
            'city',
            'country',
            'pincode',
            'pan_number',
            'gst_number',
            'creation_ip',
            'created_by',
            'updated_date',
            'updated_ip',
            'updated_by',
            'status',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function role()
    {
        return $this->hasMany(Role::class);
    }

    public function users()
    {
        return $this->belongsToMany(
            User::class, 'user_account_roles'
        );
    }
    public function roles()
    {
        return $this->belongsToMany(
            Role::class, 'user_account_roles'
        );
    }
}
