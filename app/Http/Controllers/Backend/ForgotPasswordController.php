<?php
/**
 * Created By DhanPris
 *
 * @Filename     ForgotPasswordController.php
 * @LastModified 7/24/18 4:13 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Services\Contracts\AuthContract;
use Illuminate\Database\QueryException;

class ForgotPasswordController extends Controller
{

    /**
     * Display the password reset view for the email.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function forgotPassword()
    {
        return view('backend.auth.password.forgot');
    }

    /**
     * Send the given user's email reset instruction.
     *
     * @param ForgotPasswordRequest $request
     *
     * @param AuthContract          $authContract
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function actionForgotPassword(ForgotPasswordRequest $request, AuthContract $authContract)
    {

        try {
            #Send Email Forgot Password
            $authContract->forgotPassword($request);

            session()->flash('success', __('auth.forgot_password_successful'));
            return redirect()->route('login.form');

        } catch (QueryException $exception) {

            session()->flash('failed', $exception->getMessage() . ' ' . $exception->getLine());

            return redirect()->back();
        }

    }
}