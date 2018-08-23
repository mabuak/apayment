<?php
/**
 * Created By DhanPris
 *
 * @Filename     InvoiceItemRepository.php
 * @LastModified 8/7/18 4:09 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Repositories;

use App\Models\InvoiceItem;
use App\Repositories\Contract\InvoiceItemContract;

class InvoiceItemRepository extends BaseRepository implements InvoiceItemContract
{
    /**
     * @var
     */
    protected $model;

    /**
     * Setting our class $DogModel to the injected model
     *
     * @param InvoiceItem $model
     *
     * @internal param Model $dog
     */
    public function __construct(InvoiceItem $model)
    {
        $this->model = $model;
    }

    public function createMany($model, array $data)
    {
        return $model->createMany($data);
    }
}
