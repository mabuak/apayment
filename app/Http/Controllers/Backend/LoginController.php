<?php
/**
 * Created By DhanPris
 *
 * @Filename     LoginController.php
 * @LastModified 7/24/18 8:59 AM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\Contracts\AuthContract;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class LoginController extends Controller
{

    /**
     * Show the form for logging the user in.
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {

        if (Sentinel::guest() == false) {
            return redirect()->route('backend.home');
        }

        return view('backend.auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param loginRequest $request
     * @param AuthContract $authContract
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function actionLogin(LoginRequest $request, AuthContract $authContract)
    {

        try {
            if ($authContract->login($request)) {

                session()->flash('success', __('auth.login_successful'));

                return redirect('/auth');

            } else {

                session()->flash('failed', __('auth.login_unsuccessful'));

                return redirect()->route('login.form');

            }
        } catch (ThrottlingException $exception) {

            session()->flash('failed', __('auth.login_timeout'));

            return redirect()->route('login.form');

        } catch (NotActivatedException $exception) {

            session()->flash('failed', __('auth.login_unsuccessful_not_active'));

            return redirect()->route('login.form');
        }
    }

    /**
     * Handle a logout request to the application.
     *
     * @param AuthContract $authContract
     *
     * @return \Illuminate\Http\Response
     *
     * @internal param Request $request
     */
    public function logout(AuthContract $authContract)
    {

        $authContract->logout();

        session()->flash('success', __('auth.logout_successful'));

        return redirect()->route('login.form');
    }
}