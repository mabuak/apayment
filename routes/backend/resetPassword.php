<?php
/**
 * Created By DhanPris
 *
 * @Filename     resetPassword.php
 * @LastModified 7/24/18 4:22 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

Route::group(['middleware' => [
    'language'
], 'prefix'                => '/reset-password', 'namespace' => 'Backend'], function () {

    Route::get('{userId}/{code}', 'ResetPasswordController@resetPassword')->name('reset_password.form');

    // For Action
    Route::post('{userId}/{code}', ['uses' => 'ResetPasswordController@actionResetPassword'])->name('reset_password.action');

});
