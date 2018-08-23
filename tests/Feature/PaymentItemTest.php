<?php
/**
 * Created By DhanPris
 *
 * @Filename     PaymentItemTest.php
 * @LastModified 8/7/18 12:29 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace Tests\Feature;

use App\Models\PaymentItem;
use Faker\Factory;
use Tests\TestCase;

class PaymentItemTest extends TestCase
{

    public function testPaymentItemList()
    {
        $this->login();

        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->get(route('payment_item.index'));

        $response->assertStatus(200);

        $this->logout();
    }

    public function testAnyDataPaymentItemFailed()
    {
        $this->login();
        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->get(route('payment_item.ajax.datatable'));

        $response->assertStatus(404);

        $this->logout();
    }

    public function testAnyData()
    {
        $this->login();
        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->json('GET', route('payment_item.ajax.datatable'), [], ['HTTP_X-Requested-With' => 'XMLHttpRequest']);

        $response->assertStatus(200);

        $this->logout();
    }

    public function testCreatePaymentItemValidationFailed()
    {
        $this->login();

        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->post(route('payment_item.store'), []);

        $response->assertSessionHas('errors');
        $response->assertStatus(302);

        $this->logout();
    }

    public function testCreatePaymentItemForm()
    {
        $this->login();

        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->get(route('payment_item.create'));

        $response->assertStatus(200);

        $this->logout();
    }

    public function testCreatePaymentItem()
    {
        $this->login();

        $faker = Factory::create();

        $data = [
            'name'        => $faker->name,
            'amount'      => $faker->randomFloat(),
            'currency'    => 'HKD',
            'previousUrl' => route('user.index'),
        ];

        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->post(route('payment_item.store'), $data);

        $response->assertStatus(302);
        $response->assertSessionHas('success');

        $this->logout();
    }

    public function testChangePaymentItemForm()
    {
        $this->login();


        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->get(route('payment_item.edit', [PaymentItem::orderBy('id', 'desc')->first()->id]));

        $response->assertStatus(200);

        $this->logout();
    }

    public function testChangePaymentItem()
    {
        $this->login();

        $faker = Factory::create();

        $data     = [
            'name'        => $faker->name,
            'amount'      => $faker->randomFloat(),
            'currency'    => 'HKD',
            'previousUrl' => route('user.index'),
        ];
        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->put(route('payment_item.update', [PaymentItem::orderBy('id', 'desc')->first()->id]), $data);

        $response->assertStatus(302);
        $response->assertSessionHas('success');

        $this->logout();
    }

    public function testDeletePaymentItem(){
        $this->login();

        $response = $this->withSession(['cartalyst_sentinel' => $this->sentinel])->delete(route('payment_item.destroy', [PaymentItem::orderBy('id', 'desc')->first()->id]));

        $response->assertStatus(302);
        $response->assertSessionHas('success');

        $this->logout();
    }
}
