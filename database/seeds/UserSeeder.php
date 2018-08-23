<?php
/**
 * Created By DhanPris
 *
 * @Filename     UserSeeder.php
 * @LastModified 8/7/18 4:09 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        #Create User
        $credentials = [
            'email'      => 'admin@admin.com',
            'password'   => 'password',
            'first_name' => 'Rama',
            'last_name'  => 'Dhan',
            'token'      => md5(now()),
        ];

        $userDb = Sentinel::registerAndActivate($credentials);

        #Create Role
        Sentinel::getRoleRepository()
            ->createModel()
            ->create(
                [
                    'name' => 'Root',
                    'slug' => 'root',
                ]
            )
            ->users()
            ->attach($userDb);

        Sentinel::getRoleRepository()
            ->createModel()
            ->create(
                [
                    'name'        => 'User',
                    'slug'        => 'user',
                    'permissions' => ['dashboard' => true],
                ]
            )->users();
    }
}
