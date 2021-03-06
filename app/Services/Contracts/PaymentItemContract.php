<?php
/**
 * Created By DhanPris
 *
 * @Filename     PaymentItemContract.php
 * @LastModified 8/7/18 4:09 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Services\Contracts;

interface PaymentItemContract
{

    public function get(int $id);

    public function datatableWith($select, array $with);

    public function store($request);

    public function update(int $id, array $input);

    public function delete($id);

    public function getUserPaymentItem(int $userId);
}
