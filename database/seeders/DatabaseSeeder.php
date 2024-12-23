<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::create([
        //     'name' => 'Moner Ahmad',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('password'),
        //     'is_admin' => true
        // ]);
        User::create([
            'name' => 'Mohamad Gothani',
            'email' => 'user@gmail.com',
            'password' => Hash::make('mohamad'),
            'is_admin' => false
        ]);
    }
}
