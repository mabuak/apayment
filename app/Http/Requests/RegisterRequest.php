<?php
/**
 * Created By DhanPris
 *
 * @Filename     registerRequest.php
 * @LastModified 7/18/18 1:37 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerRequest extends FormRequest {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {

        return [
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|confirmed|min:8',
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
            'first_name' => __('auth.form_user_fname_label'),
            'last_name'  => __('auth.form_user_lname_label'),
            'email'      => __('auth.form_user_email_label'),
            'password'   => __('auth.form_user_password_label'),
        ];
    }
}
