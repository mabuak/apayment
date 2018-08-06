<?php
/**
 * Created By DhanPris
 *
 * @Filename     Role.php
 * @LastModified 5/30/18 10:23 AM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Models;

use Cartalyst\Sentinel\Roles\EloquentRole;

class Role extends EloquentRole
{
    protected $fillable = [
        'name',
        'slug',
        'permissions',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'permissions' => 'array',
    ];

}
