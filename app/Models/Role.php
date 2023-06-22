<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'account_id',
        'role_name',
        'creation_date',
        'creation_ip',
        'created_by',
        'updated_date',
        'updated_ip',
        'updated_by',
        'status',
    ];
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }
    public function users()
    {
        return $this->belongsToMany(
            User::class, 'user_account_roles'
        );
    }
    public function accounts()
    {
        return $this->belongsToMany(
            Account::class, 'user_account_roles'
        );
    }
}
