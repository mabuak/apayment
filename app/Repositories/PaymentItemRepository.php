<?php
/**
 * Created By DhanPris
 *
 * @Filename     PaymentItemRepository.php
 * @LastModified 8/7/18 4:09 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Repositories;

use App\Models\PaymentItem;
use App\Repositories\Contract\PaymentItemContract;
use App\Scopes\GrantScope;

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

    /**
     * @param $column
     * @param $value
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getManyWhereWithoutScope($column, $value)
    {
        return $this->model->newQueryWithoutScope(new GrantScope())->where($column, $value)->get();
    }
}
