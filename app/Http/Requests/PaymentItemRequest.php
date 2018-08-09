<?php
/**
 * Created By DhanPris
 *
 * @Filename     PaymentItemRequest.php
 * @LastModified 8/7/18 4:12 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentItemRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name'     => 'required',
            'price'    => 'required',
            'currency' => 'required',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name'     => __('paymentItem.form_name'),
            'amount'   => __('paymentItem.form_amount'),
            'currency' => __('paymentItem.form_currency'),
        ];
    }
}
