<?php
/**
 * Created By DhanPris
 *
 * @Filename     checkout.php
 * @LastModified 8/8/18 10:24 AM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

Route::group(
    [
        'middleware' => [
            'language',
            'prevent.back.history',
        ],
        'prefix'     => 'checkout',
        'namespace'  => 'Frontend',
    ],
    function () {
        Route::get('', 'CheckoutController@create')
            ->name('checkout.create');

        Route::post('', 'CheckoutController@store')
            ->name('checkout.store');

        Route::get('paypal', 'CheckoutController@paypal')
            ->name('checkout.paypal');

        Route::get('paypal/success', 'CheckoutController@paypalThankyou')
            ->name('checkout.paypal.success');

        Route::get('paypal/cancel', 'CheckoutController@paypalCancel')
            ->name('checkout.paypal.cancel');

    }
);