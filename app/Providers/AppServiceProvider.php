<?php
/**
 * Created By DhanPris
 *
 * @Filename     AppServiceProvider.php
 * @LastModified 8/7/18 4:09 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Providers;

use App\Services\Contracts\{AuthContract, InvoiceContract, PaymentItemContract, PaypalContract, RoleContract, UserContract};
use App\Services\{AuthService, InvoiceService, PaymentItemService, PaypalService, RoleService, UserService};
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
            RoleService::class
        );

        $this->app->bind(
            PaymentItemContract::class,
            PaymentItemService::class
        );

        $this->app->bind(
            PaypalContract::class,
            PaypalService::class
        );

        $this->app->bind(
            InvoiceContract::class,
            InvoiceService::class
        );
    }
}
