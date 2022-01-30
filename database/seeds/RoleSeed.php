<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$role = Role::create(['name' => 'admin']);
        // Create a manager role for users authenticating with the admin guard:
        $role = Role::create(['guard_name' => 'admin', 'name' => 'administrator']);
        $role->givePermissionTo('users_manage');
    }
}
