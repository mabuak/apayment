<?php
/**
 * Created By DhanPris
 *
 * @Filename     InvoiceItem.php
 * @LastModified 8/7/18 4:19 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $fillable
        = [
            'name',
            'price',
            'invoice_id',
        ];
}
