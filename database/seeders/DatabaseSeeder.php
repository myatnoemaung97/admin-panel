<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();

        User::create([
            'username' => 'admin',
            'name' => 'Admin',
            'password' => bcrypt('qweasd')
        ]);

        $permissions = [
            'user-management',
            'role-management',
            'dashboard',
            'fry-management',
            'menu-management',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

    }
}
