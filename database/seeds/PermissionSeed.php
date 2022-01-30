<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Artisan;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('cache:clear');
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        //Permission::create(['name' => 'users_manage']);
        // Define a `publish articles` permission for the admin users belonging to the admin guard
        Permission::create(['guard_name' => 'admin', 'name' => 'users_manage']);

    }
}
