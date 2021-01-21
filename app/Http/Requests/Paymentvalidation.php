<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Paymentvalidation extends FormRequest
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
            'payment_option' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'payment_option.required' => 'Chọn 1 hình thức thanh toán',
        ];
    }
}
