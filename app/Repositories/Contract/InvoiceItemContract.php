<?php
/**
 * Created By DhanPris
 *
 * @Filename     InvoiceItemContract.php
 * @LastModified 8/7/18 4:56 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Repositories\Contract;

interface InvoiceItemContract
{
    public function create(array $data);

    public function createMany($model, array $data);

    public function update($id, array $data);
}