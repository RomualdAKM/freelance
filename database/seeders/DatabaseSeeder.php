<?php

namespace Database\Seeders;

use App\Models\Parrain;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            
            'name' => 'Super Admin',
            'first_name' => 'Super Admin',
            'phone' => '97979797',
            'adress' => 'Super Admin',
            'code' => 'SUPERADMIN',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);


        // Parrain::factory()->create([
            
        //     'code_parrain' => 'test1',
        //     'user_id' => 1,
            
        // ]);
    }
}
