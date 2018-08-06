<?php
/**
 * Created By DhanPris
 *
 * @Filename     register.php
 * @LastModified 7/24/18 4:16 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

Route::group(['middleware' => [
    'language'
], 'prefix'                => '/register', 'namespace' => 'Backend'], function () {

    Route::get('', 'RegisterController@register')->name('register.form');

    // For Action
    Route::post('', ['uses' => 'RegisterController@actionRegistration'])->name('action.register');

    Route::get('activate/{userId}/{code}', 'RegisterController@activate')->name('register.activate');
});
