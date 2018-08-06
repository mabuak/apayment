<?php

namespace Tests;

use App\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Session;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $sentinel;

    protected function setUp()
    {
        /**
         * This disables the exception handling to display the stacktrace on the console
         * the same way as it shown on the browser
         */
        parent::setUp();
    }

    protected function disableExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, new class extends Handler
        {
            public function __construct()
            {
            }

            public function report(\Exception $e)
            {
                // no-op
            }

            public function render($request, \Exception $e)
            {
                throw $e;
            }
        });
    }

    protected function login($email = 'admin@admin.com', $password = 'password')
    {
        $credentials = [
            'email'    => $email,
            'password' => $password,
        ];

        $request        = $this->post(route('action.login', $credentials));
        $this->sentinel = Session::get('cartalyst_sentinel');


        return $request;
    }

    protected function logout()
    {
        $this->get(route('logout'));
    }
}
