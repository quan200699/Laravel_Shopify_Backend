<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $roles = App\Role::all();
        $user->id = 1;
        $user->fullName = "adminUser";

        $user->email = "admin@gmail.com";

        $user->password = bcrypt("admin");
        $user->timestamps = false;
        DB::table('roles_users')->insert([
            'user_id' => $user->id,
            'role_id' => $roles[0]->id
        ]);
        $user->save();
    }
}
