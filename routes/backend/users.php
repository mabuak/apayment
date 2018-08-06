<?php
/**
 * Created By DhanPris
 *
 * @Filename     users.php
 * @LastModified 6/9/18 11:38 AM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

Route::group([
    'middleware' => [
        'language',
        'prevent.back.history'
    ],
    'prefix'     => 'users',
    'namespace'  => 'Backend',
], function () {
    //Resource Route
    Route::get('', 'UserController@index')
        ->name('user.index')->middleware('sentinel.permission:user.show');

    Route::get('/create', 'UserController@create')
        ->name('user.create')->middleware('sentinel.permission:user.create');

    Route::post('', 'UserController@store')
        ->name('user.store')->middleware('sentinel.permission:user.create');

    Route::get('/{id}/show', 'UserController@show')
        ->name('user.show')->middleware('sentinel.permission:user.show');

    Route::get('/{id}/edit', 'UserController@edit')
        ->name('user.edit')->middleware('sentinel.permission:user.edit');

    Route::put('/{id}', 'UserController@update')
        ->name('user.update')->middleware('sentinel.permission:user.edit');

    Route::delete('/{id}', 'UserController@destroy')
        ->name('user.destroy')->middleware('sentinel.permission:user.destroy');

    // For Datatables
    Route::get('/ajax/datatable', 'UserController@datatable')
        ->name('user.ajax.datatable')->middleware('sentinel.permission:user.show');

    // For Change User Status
    Route::put('/status/{id}', 'UserController@status')
        ->name('user.status')
        ->where('id', '[0-9]+')->middleware('sentinel.permission:user.status');

});