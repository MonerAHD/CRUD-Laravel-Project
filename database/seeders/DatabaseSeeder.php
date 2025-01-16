<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Contracts\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        // $this->call(PermissionsTableSeeder::class);
        // $this->call(RolesTableSeeder::class);



        // User::create([
        //     'name' => 'Moner',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('12345678'),
        //     'confirmation_password' => Hash::make('12345678'),
        //     'role' => 'admin',
        //     'user_image'=> '',
        // ]);
        // User::create([
        //     'name' => 'ali',
        //     'email' => 'ali@gmail.com',
        //     'password' => Hash::make('12345678'),
        //     'role' => 'user',
        //     'user_image'=> '',
        // ]);
    }
}
