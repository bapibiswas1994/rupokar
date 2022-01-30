<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Bapi',
            'email' => 'bapi@gamil.com',
            'password' => bcrypt('password')
        ]);
        //$user->assignRole('administrator');

    }
}
