<?php

/**
 * Created By DhanPris
 *
 * @Filename     LoginService.php
 * @LastModified 7/23/18 4:06 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Services\Contracts;

interface AuthContract
{

    /**
     * Handle Login Action
     *
     * @param $request
     *
     * @return mixed
     */
    public function login($request);

    /**
     * Handle Logout Action
     *
     * @return mixed
     */
    public function logout();

    /**
     * Handle Send Email Confirmation Change Password Action
     *
     * @param $request
     *
     * @return mixed
     */
    public function forgotPassword($request);

    /**
     * Handle Change Password Action
     *
     * @param $request
     * @param $user
     *
     * @return mixed
     */
    public function changePassword($request, $user);

    /**
     * Handle User Registration Action
     *
     * @param $request
     *
     * @return mixed
     */
    public function register($request);

}