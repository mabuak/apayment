<?php
/**
 * Created By DhanPris
 *
 * @Filename     ResetPasswordController.php
 * @LastModified 7/24/18 4:28 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class ResetPasswordController extends Controller
{
    /**
     * Display the password reset view for the given token.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function resetPassword()
    {
        return view('backend.auth.password.reset');
    }

    /**
     * Reset the given user's password.
     *
     * @param ResetPasswordRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function actionResetPassword(ResetPasswordRequest $request)
    {
        #Get User Login
        $user = Sentinel::findById($request->userId);

        #When Reset Code Is Invalid Or Expired
        if (!Reminder::complete($user, $request->code, $request->password)) {
            session()->flash('failed', __('Invalid or expired reset code.'));

            return redirect()->route('forgot_password.form');
        }

        session()->flash('success', __('auth.password_change_successful'));

        return redirect()->route('login.form');
    }
}