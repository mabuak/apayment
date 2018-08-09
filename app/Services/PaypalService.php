<?php
/**
 * Created By DhanPris
 *
 * @Filename     PaypalService.php
 * @LastModified 8/7/18 4:51 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Services;

use App\Services\Contracts\PaypalContract;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaypalService implements PaypalContract
{
    protected $expressCheckout;

    public function __construct(ExpressCheckout $expressCheckout)
    {
        $this->expressCheckout = $expressCheckout;
    }

    /**
     * @return array
     */
    private function paypalConfiguration()
    {
        return [
            'BRANDNAME'   => config('paypal.brand_name'),
            'LOGOIMG'     => config('paypal.logo_img'),
            'CHANNELTYPE' => 'Merchant',
        ];
    }

    /**
     * @param $items
     * @param $returnUrl
     * @param $cancelUrl
     *
     * @param $invoiceNo
     *
     * @return mixed
     * @throws \Exception
     */
    public function makeCheckoutData($items, $returnUrl, $cancelUrl, $invoiceNo)
    {
        $data['invoice_id']          = $invoiceNo ?? '#'.sprintf('%06d', random_int(1000, 10000000000));
        $data['invoice_description'] = "Order ". $data['invoice_id'];
        $data['return_url']          = $returnUrl;
        $data['cancel_url']          = $cancelUrl;

        $data['items'] = [];
        foreach ($items as $item) {
            $data['items'][] = [
                'name'  => $item->name,
                'price' => $item->price,
            ];
        }

        $total = 0;
        foreach ($data['items'] as $item) {
            $total += $item['price'];
        }
        $data['total'] = $total;

        return $data;
    }

    /**
     * @param $checkoutData
     *
     * @return array|\Psr\Http\Message\StreamInterface
     * @throws \Exception
     */
    public function setExpressCheckout($checkoutData)
    {
        return $this->expressCheckout->addOptions($this->paypalConfiguration())->setExpressCheckout($checkoutData);
    }

    /**
     * @param $checkoutData
     * @param $token
     * @param $payerId
     *
     * @return array|\Psr\Http\Message\StreamInterface
     * @throws \Exception
     */
    public function doExpressCheckoutPayment($checkoutData, $token, $payerId)
    {
        return $this->expressCheckout->doExpressCheckoutPayment($checkoutData, $token, $payerId);
    }
}

