<?php
/**
 * Created By DhanPris
 *
 * @Filename     InvoiceContract.php
 * @LastModified 8/7/18 4:33 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Repositories\Contract;

interface InvoiceContract
{
    public function save($model);

    public function getOneWhere($column, $value, $with = []);

    public function getModel();

    public function update($id, array $data);
}