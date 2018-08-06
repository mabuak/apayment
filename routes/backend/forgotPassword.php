<?php
/**
 * Created By DhanPris
 *
 * @Filename     forgotPassword.php
 * @LastModified 7/24/18 4:22 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

Route::group(['middleware' => [
    'language'
], 'prefix'                => '/forgot-password', 'namespace' => 'Backend'], function () {

    Route::get('', 'ForgotPasswordController@forgotPassword')->name('forgot_password.form');

    // For Action
    Route::post('', ['uses' => 'ForgotPasswordController@actionForgotPassword'])->name('forgot_password.action');

});