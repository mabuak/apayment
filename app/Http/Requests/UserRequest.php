<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'first_name'  => 'required|regex:/(^[A-Za-z0-9_-_ ]+$)+/',
            'last_name'   => 'required|regex:/(^[A-Za-z0-9_-_ ]+$)+/',
            'email'       => 'required|unique:users|email',
            'role'        => 'required',
            'password'    => 'required|confirmed|min:8',
        ];

        if($this->id){
            $rules = array_except($rules, ['email', 'password']);

            if ($this->password !== null) {
                $rules = ['password' => 'confirmed|min:8'];
            }
        }

        return $rules;
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
            'role'       => __('auth.form_user_role_label'),
            'password'   => __('auth.form_user_password_label'),
        ];
    }
}
