<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Adminvalidation extends FormRequest
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
            'admin_email' => 'required|min:5',
            'admin_password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'admin_email.required' => 'Email không được để trống',
            'admin_email.min' => 'Email phải từ 5 ký tự trở lên',
            'admin_password.required' => 'Mật khẩu không được để trống',
            'admin_password.min' => 'Mật khẩu phải từ 6 ký tự trở lên',
        ];
    }
}
