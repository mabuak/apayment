<?php
/**
 * Created By DhanPris
 *
 * @Filename     roles.php
 * @LastModified 6/9/18 11:38 AM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

Route::group([
    'middleware' => [
        'language',
        'prevent.back.history'
    ],
    'prefix'     => 'roles',
    'namespace'  => 'Backend'
], function () {

    Route::get('', 'RoleController@index')
        ->name('role.index')->middleware('sentinel.permission:role.show');

    Route::get('/create', 'RoleController@create')
        ->name('role.create')->middleware('sentinel.permission:role.create');

    Route::post('', 'RoleController@store')
        ->name('role.store')->middleware('sentinel.permission:role.create');

    Route::get('/{id}/show', 'RoleController@show')
        ->name('role.show')->middleware('sentinel.permission:role.show');

    Route::get('/{id}/edit', 'RoleController@edit')
        ->name('role.edit')->middleware('sentinel.permission:role.edit');

    Route::put('/{id}', 'RoleController@update')
        ->name('role.update')->middleware('sentinel.permission:role.edit');

    Route::delete('/{id}', 'RoleController@destroy')
        ->name('role.destroy')->middleware('sentinel.permission:role.destroy');

    // For Datatables
    Route::get('/ajax/datatable', 'RoleController@datatable')
        ->name('role.ajax.datatable')->middleware('sentinel.permission:role.show');

    Route::get('/{id}/copy', 'RoleController@copy')
        ->name('role.copy')->middleware('sentinel.permission:role.copy');

});