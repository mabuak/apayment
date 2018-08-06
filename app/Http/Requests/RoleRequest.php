<?php
/**
 * Created By DhanPris
 *
 * @Filename     RoleRequest.php
 * @LastModified 7/18/18 1:37 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest {

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
			'name' => 'required|unique:roles,name,' .  $this->id,
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
            'name'    => __('auth.form_role_name_label'),
        ];
    }
}
