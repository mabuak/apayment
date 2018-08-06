<?php
/**
 * Created By DhanPris
 *
 * @Filename     login.php
 * @LastModified 7/23/18 6:47 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

Route::group(['middleware' => [
    'language'
], 'prefix'                => '/login', 'namespace' => 'Backend'], function () {

    Route::get('', 'LoginController@login')
        ->name('login.form');

    // For Action
    Route::post('', ['uses' => 'LoginController@actionLogin'])
        ->name('action.login')
        ->middleware('prevent.back.history');
});

/**
 * Logout Route
 */
Route::group(['middleware' => [
    'language',
    'sentinel.permission:dashboard'
], 'prefix'                => '/logout', 'namespace' => 'Backend'], function () {

    Route::get('', 'LoginController@logout')
        ->name('logout')
        ->middleware('prevent.back.history');
});
