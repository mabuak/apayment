<?php
/**
 * Created By DhanPris
 *
 * @Filename     UserRepository.php
 * @LastModified 7/24/18 10:38 AM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contract\UserContract;

class UserRepository extends BaseRepository implements UserContract
{
    /**
     * @var
     */
    protected $model;

    /**
     * Setting our class $DogModel to the injected model
     *
     * @param User $model
     *
     * @internal param Model $dog
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
