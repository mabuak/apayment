<?php
/**
 * Created By DhanPris
 *
 * @Filename     LoginTest.php
 * @LastModified 1/3/18 11:52 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace Tests\Feature;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * @group Login
     *
     * @return void
     */
    public function testLoginForm()
    {
        $response = $this->get(route('login.form'));
        $response->assertStatus(200);
    }

    /**
     * @group Login
     *
     * @return void
     */
    public function testFailedLoginAction(){

        Sentinel::disableCheckpoints();

        $credentials = [
            'email'    => 'admin@admin.com',
            'password' => 'passwords',
        ];

        $response = $this->post(route('action.login', $credentials));

        $response->assertSessionHas('failed');
        $response->assertRedirect(route('login.form'));
    }

    /**
     * @group Login
     *
     * @return void
     */
    public function testSuccessLoginAction(){
        $credentials = [
            'email'    => 'admin@admin.com',
            'password' => 'password',
        ];

        $response = $this->post(route('action.login', $credentials));

        $response->assertSessionHas('success');
        $response->assertRedirect(route('backend.home'));

        $this->logout();
    }

    /**
     * @group Login
     *
     * @return void
     */
    public function testLogoutAction(){
        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->get(route('logout'));
        $response->assertStatus(302);
    }
}
