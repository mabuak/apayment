<?php
/**
 * Created By DhanPris
 *
 * @Filename     forgotPasswordRequest.php
 * @LastModified 7/18/18 11:33 AM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest {
	
	
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
            'email'            => 'required|email',
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
            'email' => __('auth.form_user_email_label'),
        ];
    }
}
