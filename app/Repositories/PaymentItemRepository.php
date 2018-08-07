<?php
/**
 * Created By DhanPris
 *
 * @Filename     PaymentItemRepository.php
 * @LastModified 8/6/18 4:55 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Repositories;

use App\Models\PaymentItem;
use App\Repositories\Contract\PaymentItemContract;

class PaymentItemRepository extends BaseRepository implements PaymentItemContract
{
    /**
     * @var
     */
    protected $model;

    /**
     * Setting our class $DogModel to the injected model
     *
     * @param PaymentItem $model
     *
     * @internal param Model $dog
     */
    public function __construct(PaymentItem $model)
    {
        $this->model = $model;
    }
}
