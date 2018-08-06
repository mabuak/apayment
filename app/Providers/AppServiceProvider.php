<?php

namespace App\Providers;

use App\Services\Contracts\{AuthContract, RoleContract, UserContract};
use App\Services\{AuthService, RoleServiceService, UserService};
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            AuthContract::class,
            AuthService::class
        );

        $this->app->bind(
            UserContract::class,
            UserService::class
        );

        $this->app->bind(
            RoleContract::class,
            RoleServiceService::class
        );
    }
}
