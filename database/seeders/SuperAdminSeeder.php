<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $appName = config('app.name');
        $email = 'admin@' . strtolower($appName) . '.com';

        // Create Super Admin user
        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'password' => bcrypt('password'),
            ],
        );

        $role = Role::where('name', 'Super Admin')->first();

        if (!$role) {
            $role = Role::create([
                'name' => 'Super Admin',
                'guard_name' => 'web',
            ]);
        }

        if (!$user->hasRole('Super Admin')) {
            // Assign Super Admin role to Super Admin user
            $user->assignRole($role);
        }

        // Assign All permissions to Super Admin role
        $permissions = Permission::all();
        $role->syncPermissions($permissions);
    }
}
