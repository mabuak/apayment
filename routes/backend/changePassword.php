<?php
/**
 * Created By DhanPris
 *
 * @Filename     changePassword.php
 * @LastModified 7/24/18 4:22 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

Route::group(['middleware' => [
    'language', 'sentinel.permission:dashboard'
], 'prefix'                => '/change-password', 'namespace' => 'Backend'], function () {

    Route::get('', 'ChangePasswordController@changePassword')->name('change_password.form');

    // For Action
    Route::post('', ['uses' => 'ChangePasswordController@actionChangePassword'])->name('change_password.action');

});
