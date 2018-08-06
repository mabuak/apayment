<?php
/**
 * Created By DhanPris
 *
 * @Filename     UserService.php
 * @LastModified 7/24/18 10:47 AM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Services;

use App\Services\Contracts\AuthContract;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AuthService implements AuthContract
{
    /**
     * @param $request
     *
     * @return bool|\Cartalyst\Sentinel\Users\UserInterface|mixed
     */
    public function login($request)
    {
        $credentials = array(
            'email'    => $request->email,
            'password' => $request->password,
        );

        $remember = $request->remember == 'On' ? true : false;

        return Sentinel::authenticate($credentials, $remember);
    }

    /**
     * @return bool|mixed
     */
    public function logout()
    {
        return Sentinel::logout();
    }

    /**
     * @param $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function forgotPassword($request)
    {
        $user = DB::transaction(
            function () use ($request) {
                $user = Sentinel::findByCredentials(['login' => $request->email]);

                $reminder = Reminder::exists($user) ?: Reminder::create($user);
                $code     = $reminder->code ?? null;

                return compact('user', 'code');
            }
        );

        Mail::send(
            'backend.auth.email.password',
            $user,
            function ($mail) use ($user) {
                $mail->to($user['user']->email)
                    ->subject('Reset your account password.');
            }
        );

        return $user;
    }

    /**
     * @param $request
     * @param $user
     *
     * @return mixed
     * @throws \Throwable
     */
    public function changePassword($request, $user)
    {
        $user = DB::transaction(
            function () use ($request, $user) {

                #Prepare Credentials Data
                $credentials = [
                    'email'    => $user->email,
                    'password' => $request->old_password,
                ];

                #Validate Credentials
                if (Sentinel::validateCredentials($user, $credentials) == false) {
                    return false;
                };

                #Update Password
                $credentials['password'] = $request->password;
                Sentinel::update($user, $credentials);

                return $this->logout();
            }
        );

        return $user;
    }

    /**
     * @param $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function register($request)
    {
        $user = DB::transaction(
            function () use ($request) {

                #Register User
                $user = Sentinel::register($request->all());

                #Get Activation Code
                $activationCode = Activation::create($user)->code;

                #Attach Role
                $role = Sentinel::findRoleBySlug('user');
                $role->users()
                    ->attach($user);

                return compact('user', 'activationCode');
            }
        );

        Mail::send(
            'backend.auth.email.activate',
            $user,
            function ($mail) use ($user) {
                $mail->to($user['user']->email)
                    ->subject('Registration email confirmation');
            }
        );

        return $user;
    }
}

