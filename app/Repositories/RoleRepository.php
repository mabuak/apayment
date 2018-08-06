<?php
/**
 * Created By DhanPris
 *
 * @Filename     RoleRepository.php
 * @LastModified 7/24/18 10:50 AM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Repositories;

use App\Models\Role;
use App\Repositories\Contract\RoleContract;

class RoleRepository extends BaseRepository implements RoleContract
{
    /**
     * @var
     */
    protected $model;

    /**
     * Setting our class $DogModel to the injected model
     *
     * @param Role $model
     *
     * @internal param Model $dog
     */
    public function __construct(Role $model)
    {
        $this->model = $model;
    }
}
