<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'username' => 'admin',
            'name' => 'Admin',
            'password' => bcrypt('qweasd')
        ]);

        User::factory(20)->create();

        $permissions = [
            'user-management',
            'role-management',
            'dashboard',
            'fry-management',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $adminRole = Role::create([
            'name' => 'Admin'
        ]);

        $staffRole = Role::create([
            'name' => 'Staff'
        ]);

        $adminRole->syncPermissions(Permission::all()->pluck('id'));
        $staffRole->syncPermissions(Permission::whereIn('id', [1, 2, 3])->pluck('id'));

        $admin->assignRole('Admin');
    }
}
