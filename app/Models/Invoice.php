<?php
/**
 * Created By DhanPris
 *
 * @Filename     Invoice.php
 * @LastModified 8/7/18 4:34 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable
        = [
            'invoice_no',
            'grand_total',
            'payment_method',
            'paypal_token',
            'status',
            'user_id',
        ];

    protected $attributes
        = [
            'status' => 'Pending',
        ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
