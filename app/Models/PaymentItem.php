<?php
/**
 * Created By DhanPris
 *
 * @Filename     PaymentItem.php
 * @LastModified 8/7/18 4:09 PM.
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
            'price',
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
    public function setPriceAttribute($value)
    {
        return $this->attributes['price'] = (float)str_replace(',', '', $value);
    }
}
