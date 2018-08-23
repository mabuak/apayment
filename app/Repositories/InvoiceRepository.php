<?php
/**
 * Created By DhanPris
 *
 * @Filename     InvoiceRepository.php
 * @LastModified 8/7/18 4:09 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Repositories;

use App\Models\Invoice;
use App\Repositories\Contract\InvoiceContract;

class InvoiceRepository extends BaseRepository implements InvoiceContract
{
    /**
     * @var
     */
    protected $model;

    /**
     * Setting our class $DogModel to the injected model
     *
     * @param Invoice $model
     *
     * @internal param Model $dog
     */
    public function __construct(Invoice $model)
    {
        $this->model = $model;
    }
}
