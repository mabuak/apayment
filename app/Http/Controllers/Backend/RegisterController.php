<?php
/**
 * Created By DhanPris
 *
 * @Filename     RegisterController.php
 * @LastModified 8/7/18 4:09 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\Contracts\AuthContract;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\QueryException;

class RegisterController extends Controller
{

    /**
     * Show the form for the user registration.
     *
     * @return \Illuminate\View\View
     */
    public function register()
    {
        return view('backend.auth.register');
    }

    /**
     * Handle posting of the form for the user registration.
     *
     * @param RegisterRequest $request
     *
     * @param AuthContract    $authContract
     *
     * @return \Illuminate\Http\RedirectResponse
     * @internal param RegisterService $registrationService
     */
    public function actionRegistration(RegisterRequest $request, AuthContract $authContract)
    {
        try {
            $request->offsetSet('token', md5(now()));

            $authContract->register($request);
            session()->flash('success', __('auth.activation_email_successful'));

            return redirect()->route('login.form');

        } catch (QueryException $exception) {

            session()->flash('failed', $exception->getMessage() . ' ' . $exception->getLine());

            return redirect()->back();
        }
    }

    /**
     * Handle activation for the user registration.
     *
     * @param $userId
     * @param $code
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function activate($userId, $code)
    {
        try {
            #Get User
            $user = Sentinel::findById($userId);

            #Complete Activation
            Activation::complete($user, $code);

            #Activation Success
            session()->flash('success', __('auth.activate_successful'));

            return redirect()->route('login.form');

        } catch (QueryException $exception) {

            #Activation not found or not completed.
            session()->flash('failed', __('auth.activate_unsuccessful'));

            return redirect()->route('register.form');
        }
    }

}