<?php
/**
 * Created By DhanPris
 *
 * @Filename     RepositoryServiceProvider.php
 * @LastModified 8/6/18 4:54 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Providers;

use App\Repositories\Contract\{PaymentItemContract, RoleContract, UserContract};
use App\Repositories\{PaymentItemRepository, RoleRepository, UserRepository};
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
    }
}
