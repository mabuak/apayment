<?php
/**
 * Created By DhanPris
 *
 * @Filename     ChangePasswordTest.php
 * @LastModified 7/24/18 4:49 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace Tests\Feature;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Tests\TestCase;

class ChangePasswordTest extends TestCase
{
    /**
     * @group ChangePassword
     *
     * @return void
     */
    public function testChangePasswordFailed()
    {
        $this->login();

        $data     = [
            'old_password'          => 'passwords',
            'password'              => 'password',
            'password_confirmation' => 'password',
        ];
        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->post(route('change_password.action'), $data);
        $response->assertSessionHas('failed');

        $this->logout();
    }

    /**
     * @group ChangePassword
     *
     * @return void
     */
    public function testChangePassword()
    {
        $this->login();

        $data = [
            'old_password'          => 'password',
            'password'              => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->post(route('change_password.action'), $data);
        $response->assertSessionHas('success');

        $this->logout();
    }

}
