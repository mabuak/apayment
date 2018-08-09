<?php
/**
 * Created By DhanPris
 *
 * @Filename     InvoiceService.php
 * @LastModified 8/7/18 4:58 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Services;

use App\Repositories\Contract\InvoiceContract as InvoiceRepoContract;
use App\Repositories\Contract\InvoiceItemContract;
use App\Services\Contracts\InvoiceContract;
use Illuminate\Support\Facades\DB;

class InvoiceService implements InvoiceContract
{

    protected $invoiceRepoContract;

    protected $invoiceItemRepoContract;

    public function __construct(InvoiceRepoContract $invoiceRepoContract, InvoiceItemContract $invoiceItemRepoContract)
    {
        $this->invoiceRepoContract     = $invoiceRepoContract;
        $this->invoiceItemRepoContract = $invoiceItemRepoContract;
    }

    /**
     * Prepare Data
     *
     * @param $input
     * @param $model
     *
     * @param $userId
     * @param $paymentMethod
     * @param $paypalToken
     *
     * @return array
     */
    private function makeList($model, $input, $userId, $paymentMethod, $paypalToken)
    {
        $model->invoice_no     = $input['invoice_id'];
        $model->grand_total    = $input['total'];
        $model->payment_method = $paymentMethod;
        $model->paypal_token   = $paypalToken;
        $model->user_id        = $userId;

        return $model;
    }

    /**
     * Store Request To User Table
     *
     * @param      $input
     *
     * @param      $userId
     * @param      $paymentMethod
     * @param null $paypalToken
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store($input, $userId, $paymentMethod, $paypalToken)
    {
        $data = DB::transaction(
            function () use ($input, $userId, $paymentMethod, $paypalToken) {
                $invoice = $this->invoiceRepoContract->save($this->makeList($this->invoiceRepoContract->getModel(), $input, $userId, $paymentMethod, $paypalToken));

                #Save Invoice Item
                $this->invoiceItemRepoContract->createMany($invoice->invoiceItems(), $input['items']);

                return $invoice;
            }
        );

        return $data;
    }

    /**
     * Get Invoice By Paypal Token
     *
     * @param $token
     *
     * @return mixed
     */
    public function getOneByPaypalToken($token)
    {
        return $this->invoiceRepoContract->getOneWhere('paypal_token', $token, ['invoiceItems']);
    }

    /**
     * @param $id
     * @param $input
     *
     * @return mixed
     */
    public function update($id, $input)
    {
        return $this->invoiceRepoContract->update($id, $input);
    }
}

