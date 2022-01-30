<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$role = Role::where('name', 'administrator')->first();
        $admin = Admin::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);
        $admin->assignRole('administrator');
        //$admin->assignRole($role);
    }
}
