<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Registrationvalidation extends FormRequest
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
            'customer_name' => 'required|min:5',
            'customer_email' => 'required|min:5',
            'customer_password' => 'required|min:6',
            'customer_phone' => 'required|min:10',
        ];
    }

    public function messages()
    {
        return [
            'customer_name.required' => 'Tên người dùng không được để trống',
            'customer_name.min'  => 'Tên người dùng phải từ 5 ký tự',
            'customer_email.required' => 'Tên tài khoản không được để trống',
            'customer_email.min'  => 'Tên tài khoản phải từ 5 ký tự',
            'customer_password.required' => 'Mật khẩu không được để trống',
            'customer_password.min'  => 'Mật khẩu phải từ 5 ký tự',
            'customer_phone.required' => 'Số điện thoại không được để trống',
            'customer_phone.min'  => 'Số điện thoại phải từ 5 ký tự',
        ];
    }
}
