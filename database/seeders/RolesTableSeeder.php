<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role as ModelsRole;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = ModelsRole::create(['name' => 'admin']);
        $userRole = ModelsRole::create(['name' => 'user']);

        $adminRole->givePermissionTo([
            'create users',
            'edit users',
            'view users',
            'delete users',
            'create posts',
            'edit posts',
            'delete posts',
            'view posts',
            'create comments',
            'view comments',
            'create tags',
            'edit tags',
            'view tags',
            'delete tags'
        ]);

        $userRole->givePermissionTo([
            'create posts',
            'view posts',
            'edit posts',
            'delete posts',
            'view users',
            'view tags',
            'view comments',
            'create comments',
            'delete comments',
            'edit comments'
        ]);
    }
}
