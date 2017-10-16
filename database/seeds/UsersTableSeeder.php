<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0) {
            $role = Role::where('name', 'admin')->firstOrFail();

            User::create([
                'firstname'      => 'admin',
                'lastname'       => 'admin',
                'username'       => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => str_random(60),
                'role_id'        => $role->id,
                'gender'         => 'M',
                'avatar'         => '/storage/avatars/default-M.png',
                'cover'          => '/storage/avatars/default-cover.png',
            ]);
        }
    }
}
