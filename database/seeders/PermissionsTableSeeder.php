<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission as ModelsPermission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'create posts', 'view posts', 'edit posts', 'delete posts',
            'create users', 'view users', 'edit users', 'delete users',
            'create tags', 'view tags', 'edit tags', 'delete tags',
            'create comments', 'view comments', 'edit comments', 'delete comments',
        ];

        foreach($permissions as $permission){
            ModelsPermission::firstOrCreate(['name' => $permission]);
        }
    }
}
