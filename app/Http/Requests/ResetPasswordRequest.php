<?php
/**
 * Created By DhanPris
 *
 * @Filename     resetPasswordRequest.php
 * @LastModified 7/18/18 11:33 AM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest {
	
	
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
            'password' => 'required|confirmed|min:8',
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
            'password'   => __('auth.form_user_password_label'),
        ];
    }
}
