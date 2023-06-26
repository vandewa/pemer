<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'master data'],
            ['name' => 'pengajuan'],
            ['name' => 'verivikasi'],
            ['name' => 'kesepakatan'],
            ['name' => 'perjanjian'],
            ['name' => 'home']
        ];

        foreach ($permissions as $key) {
            Permission::create(
                $key
            );
        }

        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        $user = Role::create([
            'name' => 'user',
            'guard_name' => 'web'
        ]);

        $user->syncPermissions(
            'pengajuan',
            'kesepakatan',
            'perjanjian',
            'home'
        );
    }
}
