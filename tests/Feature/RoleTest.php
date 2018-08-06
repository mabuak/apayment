<?php
/**
 * Created By DhanPris
 *
 * @Filename     RoleTest.php
 * @LastModified 6/9/18 11:38 AM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace Tests\Feature;

use App\Models\Role;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use DatabaseTransactions;

    protected function lastData()
    {
        return Role::orderBy('id', 'desc')->first();
    }

    /**
     * @group role
     */
    public function testList()
    {
        $this->login();

        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->get(route('role.index'));

        $response->assertStatus(200);

        $this->logout();
    }

    /**
     * @group role
     */
    public function testAnyDataFailed()
    {
        $this->login();
        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->get(route('role.ajax.datatable'));

        $response->assertStatus(404);

        $this->logout();
    }

    /**
     * @group role
     */
    public function testAnyData()
    {
        $this->login();
        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->json('GET', route('role.ajax.datatable'), [], ['HTTP_X-Requested-With' => 'XMLHttpRequest']);

        $response->assertStatus(200);

        $this->logout();
    }

    /**
     * @group role
     */
    public function testCreateValidationFailed()
    {
        $this->login();

        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->post(route('role.store'), []);

        $response->assertSessionHas('errors');
        $response->assertStatus(302);

        $this->logout();
    }

    /**
     * @group role
     */
    public function testCreateForm()
    {
        $this->login();

        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->get(route('role.create'));

        $response->assertStatus(200);

        $this->logout();
    }

    /**
     * @group role
     */
    public function testCreate()
    {
        $this->login();

        $faker = Factory::create();

        $data = [
            'name'        => $faker->name,
            'slug'        => $faker->name,
            'permissions' => ['dashboard' => true],
            'previousUrl' => route('user.index')
        ];

        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->post(route('role.store'), $data);

        $response->assertStatus(302);
        $response->assertSessionHas('success');

        $this->logout();
    }

    /**
     * @group role
     */
    public function testChangeForm()
    {
        $this->login();

        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->get(route('role.edit', [$this->lastData()->id]));

        $response->assertStatus(200);

        $this->logout();
    }

    /**
     * @group role
     */
    public function testChange()
    {
        $this->login();

        $faker = Factory::create();

        $lastData                = Role::orderBy('id', 'desc')->first()->toArray();
        $lastData['name']        = $faker->name();
        $lastData['slug']        = $faker->name();
        $lastData['previousUrl'] = route('role.index');

        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->put(route('role.update', [$this->lastData()->id]), $lastData);

        $response->assertStatus(302);
        $response->assertSessionHas('success');

        $this->logout();
    }

    /**
     * @group role
     */
    public function testDestroyAccount()
    {
        $this->login();

        $lastData = Role::orderBy('id', 'desc')->first();
        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->delete(route('role.destroy', [$lastData->id]));

        $response->assertStatus(302);
        $response->assertSessionHas('success');

        $this->logout();
    }
}
