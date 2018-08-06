<?php
/**
 * Created By DhanPris
 *
 * @Filename     AuthController.php
 * @LastModified 7/23/18 4:54 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Services\Contracts\AuthContract;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\QueryException;

class ChangePasswordController extends Controller
{

    /**
     * Display the change password form from auth page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changePassword()
    {
        return view('backend.auth.password.change');
    }

    /**
     * Handle change password action from auth page
     *
     * @param ChangePasswordRequest $request
     *
     * @param AuthContract          $authContract
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function actionChangePassword(ChangePasswordRequest $request, AuthContract $authContract)
    {
        try {

            #Get User
            $user = Sentinel::getUser();

            #Redirect to form when old password is false
            if ($authContract->changePassword($request, $user) == false) {
                session()->flash('failed', __('auth.reset_password_change_unsuccessful_old'));

                return redirect()->back()->withInput($request->all());
            }

            #Redirect to login form with flash data
            session()->flash('success', __('auth.password_change_successful'));

            return redirect()->route('login.form');


        } catch (QueryException $exception) {

            return redirect()->back()->withInput($request->all())->withErrors($exception->getMessage().' '.$exception->getLine());

        }
    }
}