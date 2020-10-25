<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = new Role();
        $role->id = 1;
        $role->authority = "ROLE_ADMIN";
        $role->save();
        $role = new Role();
        $role->id = 2;
        $role->authority = "ROLE_USER";
        $role->save();
    }
}
