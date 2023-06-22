<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \App\Models\Permission::truncate();
        Schema::enableForeignKeyConstraints();
        
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'event-list',
            'event-create',
            'event-edit',
            'event-delete',
            'event-live',
            'ticket-list',
            'ticket-create',
            'ticket-edit',
            'ticket-delete',
            'ticket-age-list',
            'ticket-age-create',
            'ticket-age-edit',
            'ticket-age-delete',
            'coupon-details-list',
            'coupon-details-create',
            'coupon-details-edit',
            'coupon-details-delete',
            'coupon-list',
            'coupon-create',
            'coupon-edit',
            'coupon-delete',
            'coupon-mail'
         ];
       
         foreach ($permissions as $permission) {
              Permission::create(['permission_name' => $permission]);
         }
    }
}
