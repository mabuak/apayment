<?php
/**
 * Created By DhanPris
 *
 * @Filename     RepositoryServiceProvider.php
 * @LastModified 8/7/18 4:09 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Providers;

use App\Repositories\Contract\{InvoiceContract, InvoiceItemContract, PaymentItemContract, RoleContract, UserContract};
use App\Repositories\{InvoiceItemRepository, InvoiceRepository, PaymentItemRepository, RoleRepository, UserRepository};
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application repository.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application repository.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            UserContract::class,
            UserRepository::class
        );

        $this->app->bind(
            RoleContract::class,
            RoleRepository::class
        );

        $this->app->bind(
            PaymentItemContract::class,
            PaymentItemRepository::class
        );

        $this->app->bind(
            InvoiceContract::class,
            InvoiceRepository::class
        );

        $this->app->bind(
            InvoiceItemContract::class,
            InvoiceItemRepository::class
        );
    }
}
