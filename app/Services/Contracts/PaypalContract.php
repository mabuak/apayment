<?php
/**
 * Created By DhanPris
 *
 * @Filename     PaypalContract.php
 * @LastModified 8/7/18 4:51 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Services\Contracts;

interface PaypalContract
{
    public function setExpressCheckout($checkoutData);

    public function makeCheckoutData($items, $returnUrl, $cancelUrl, $invoiceNo);

    public function doExpressCheckoutPayment($checkoutData, $token, $payerId);
}