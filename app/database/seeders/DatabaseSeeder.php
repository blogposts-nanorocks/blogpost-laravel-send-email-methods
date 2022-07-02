<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Admin1 Admin',
            'email' => 'admin1@demo.com',
            'password' => Hash::make('secret'),
            'is_admin' => true
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Admin2 Admin',
            'email' => 'admin2@demo.com',
            'password' => Hash::make('secret'),
            'is_admin' => true
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Admin3 Admin',
            'email' => 'admin3@demo.com',
            'password' => Hash::make('secret'),
            'is_admin' => true
        ]);

        \App\Models\User::factory(6)->create([
            'email_verified_at' => null
        ])->each(function ($user) {
            Project::factory(3)->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
