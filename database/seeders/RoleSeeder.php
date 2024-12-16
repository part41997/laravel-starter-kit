<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Roles
        $roles = [
            'Super Admin',
            'Admin',
            'User',
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate([
                'name' => $role,
                'guard_name' => 'web'
            ]);
        }
    }
}
