<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role;
        $role->role_desc = 'User';
        $role->save();

        $role = new Role;
        $role->role_desc = 'Admin';
        $role->save();
    }
}
