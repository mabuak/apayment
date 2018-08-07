<?php
/**
 * Created By DhanPris
 *
 * @Filename     PaymentItemContract.php
 * @LastModified 8/7/18 11:46 AM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Repositories\Contract;

interface PaymentItemContract
{
    public function create(array $data);

    public function get($id);

    public function update($id, array $data);

    public function datatableWith($select, array $with);

    public function getModel();

    public function save($model);

    public function delete($id);
}