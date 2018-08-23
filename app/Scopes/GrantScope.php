<?php
/**
 * Created By DhanPris
 *
 * @Filename     GrantScope.php
 * @LastModified 8/7/18 12:01 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Scopes;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class GrantScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $builder
     * @param  \Illuminate\Database\Eloquent\Model   $model
     *
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        if (Sentinel::hasAccess('*.grant') == false) {
            $builder->where('user_id', Sentinel::getUser()->getUserId());
        }
    }
}

