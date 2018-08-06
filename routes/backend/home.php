<?php
/**
 * Created By DhanPris
 *
 * @Filename     home.php
 * @LastModified 7/23/18 4:23 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

Route::group([
    'middleware' => [
        'language',
        'prevent.back.history',
        'sentinel.permission:dashboard'
    ],
    'namespace'  => 'Backend',
], function () {
    Route::get('', 'HomeController@index')->name('backend.home');
});

