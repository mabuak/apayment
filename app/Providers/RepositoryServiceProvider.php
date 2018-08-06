<?php
/**
 * Created By DhanPris
 *
 * @Filename     RepositoryServiceProvider.php
 * @LastModified 7/24/18 11:05 AM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Providers;

use App\Repositories\Contract\{
    RoleContract,
    UserContract
};
use App\Repositories\{
    RoleRepository,
    UserRepository
};
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
    }
}
