<?php
/**
 * Created By DhanPris
 *
 * @Filename     UserTest.php
 * @LastModified 7/12/18 2:15 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace Tests\Feature;

use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    protected function lastData()
    {
        return User::orderBy('id', 'desc')->first();
    }

    /**
     * @group user
     */
    public function testUserList()
    {
        $this->login();

        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->get(route('user.index'));

        $response->assertStatus(200);

        $this->logout();
    }

    /**
     * @group user
     */
    public function testAnyDataFailed()
    {
        $this->login();
        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->get(route('user.ajax.datatable'));

        $response->assertStatus(404);

        $this->logout();
    }

    /**
     * @group user
     */
    public function testAnyData()
    {
        $this->login();
        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->json('GET', route('user.ajax.datatable'), [], ['HTTP_X-Requested-With' => 'XMLHttpRequest']);

        $response->assertStatus(200);

        $this->logout();
    }

    /**
     * @group user
     */
    public function testCreateAccountValidationFailed()
    {
        $this->login();

        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->post(route('user.store'), []);

        $response->assertSessionHas('errors');
        $response->assertStatus(302);

        $this->logout();
    }

    /**
     * @group user
     */
    public function testCreateAccountForm()
    {
        $this->login();

        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->get(route('user.create'));

        $response->assertStatus(200);

        $this->logout();
    }

    /**
     * @group user
     */
    public function testCreateAccount()
    {
        $this->login();

        $faker = Factory::create();

        $data = [
            'server_id'             => [1],
            'first_name'            => $faker->firstName,
            'last_name'             => $faker->lastName,
            'phone'                 => $faker->e164PhoneNumber,
            'email'                 => $faker->unique()->companyEmail,
            'role'                  => 2,
            'password'              => 'password',
            'password_confirmation' => 'password',
            'previousUrl'           => route('user.index'),
        ];

        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->post(route('user.store'), $data);

        $response->assertStatus(302);
        $response->assertSessionHas('success');

        $this->logout();
    }

    /**
     * @group user
     */
    public function testChangeAccountForm()
    {
        $this->login();

        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->get(route('user.edit', [$this->lastData()->id]));

        $response->assertStatus(200);

        $this->logout();
    }

    /**
     * @group user
     */
    public function testChangeAccount()
    {
        $this->login();

        $faker = Factory::create();

        $lastUser                = $this->lastData()->toArray();
        $lastUser['server_id']   = [1];
        $lastUser['first_name']  = $faker->firstName();
        $lastUser['last_name']   = $faker->lastName;
        $lastUser['role']        = 2;
        $lastUser['previousUrl'] = route('user.index');

        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->put(route('user.update', [$this->lastData()->id]), $lastUser);

        $response->assertStatus(302);
        $response->assertSessionHas('success');

        $this->logout();
    }

    /**
     * @group user
     */
    // public function testStatusAccount()
    // {
    //     $this->login();
    //
    //     $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->put(route('user.status', [$this->lastData()->id]));
    //
    //     $response->assertStatus(302);
    //     $response->assertSessionHas('success');
    //
    //     $this->logout();
    // }

    /**
     * @group user
     */
    // public function testDestroyAccount()
    // {
    //     $this->login();
    //
    //     $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->delete(route('user.destroy', [$this->lastData()->id]));
    //
    //     $response->assertStatus(302);
    //     $response->assertSessionHas('success');
    //
    //     $this->logout();
    // }
}
