<?php
/**
 * Created By DhanPris
 *
 * @Filename     SetLocale.php
 * @LastModified 6/7/18 12:36 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $default = config('app.locale');

        // 2. retrieve selected locale if exist (otherwise return the default)
        $locale = Session::get('locale', $default);

        // 3. set the locale
        App::setLocale($locale);

        return $next($request);
    }
}
