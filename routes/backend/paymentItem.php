<?php
/**
 * Created By DhanPris
 *
 * @Filename     paymentItem.php
 * @LastModified 8/7/18 12:02 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

Route::group(
    [
        'middleware' => [
            'language',
            'prevent.back.history',
        ],
        'prefix'     => 'payment-items',
        'namespace'  => 'Backend',
    ],
    function () {
        //Resource Route
        Route::get('', 'PaymentItemController@index')
            ->name('payment_item.index')->middleware('sentinel.permission:payment_item.show');

        Route::get('/create', 'PaymentItemController@create')
            ->name('payment_item.create')->middleware('sentinel.permission:payment_item.create');

        Route::post('', 'PaymentItemController@store')
            ->name('payment_item.store')->middleware('sentinel.permission:payment_item.create');

        Route::get('/{id}/show', 'PaymentItemController@show')
            ->name('payment_item.show')->middleware('sentinel.permission:payment_item.show');

        Route::get('/{id}/edit', 'PaymentItemController@edit')
            ->name('payment_item.edit')->middleware('sentinel.permission:payment_item.edit');

        Route::put('/{id}', 'PaymentItemController@update')
            ->name('payment_item.update')->middleware('sentinel.permission:payment_item.edit');

        Route::delete('/{id}', 'PaymentItemController@destroy')
            ->name('payment_item.destroy')->middleware('sentinel.permission:payment_item.destroy');

        // For Datatables
        Route::get('/ajax/datatable', 'PaymentItemController@datatable')
            ->name('payment_item.ajax.datatable')->middleware('sentinel.permission:payment_item.show');

    }
);