<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('is_super_admin',1)->get()->first();
        if(!$user){
            \App\Models\User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@ifinish.in',
                'is_super_admin' => true,
            ])->each(function ($user) {
                // Seed the relation with one address
                $user->account()->save(\App\Models\Account::factory()->make(['created_by' => $user->id]));
                $user->details()->save(\App\Models\UserDetails::factory()->make(['created_by' => $user->id]));
    
            });
        }
        
        
    }
}
