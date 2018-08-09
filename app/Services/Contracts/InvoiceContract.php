<?php
/**
 * Created By DhanPris
 *
 * @Filename     InvoiceContract.php
 * @LastModified 8/7/18 4:56 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Services\Contracts;

interface InvoiceContract
{
    public function store($input, $userId, $paymentMethod, $paypalToken);

    public function getOneByPaypalToken($token);

    public function update($id, $input);

}
