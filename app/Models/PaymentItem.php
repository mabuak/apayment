<?php
/**
 * Created By DhanPris
 *
 * @Filename     PaymentItem.php
 * @LastModified 8/7/18 11:54 AM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Models;

use App\Scopes\GrantScope;
use Illuminate\Database\Eloquent\Model;

class PaymentItem extends Model
{
    protected $fillable = [
            'name',
            'amount',
            'currency',
            'user_id',
        ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        self::addGlobalScope(new GrantScope());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param $value
     *
     * @return float
     */
    public function setAmountAttribute($value)
    {
        return $this->attributes['amount'] = (float)str_replace(',', '', $value);
    }
}
