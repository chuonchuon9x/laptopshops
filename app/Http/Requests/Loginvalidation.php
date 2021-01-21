<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Loginvalidation extends FormRequest
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
            'email_account' => 'required|min:5',
            'password_account' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'email_account.required' => 'Tên tài khoản không được để trống',
            'email_account.min'  => 'Tên tài khoản phải từ 5 ký tự',
            'password_account.required' => 'Mật khẩu không được để trống',
            'password_account.min'  => 'Mật khẩu phải từ 5 ký tự',
        ];
    }
}
