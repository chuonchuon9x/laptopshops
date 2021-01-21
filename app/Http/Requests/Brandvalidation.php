<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Brandvalidation extends FormRequest
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
            'brand_product_name' => 'required',
            'brand_product_desc' => 'required',
            'brand_product_status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'brand_product_name.required' => 'Tên thương hiệu không được để trống',
            'brand_product_desc.required' => 'Mô tả thương hiệu không được để trống',
            'brand_product_status.required' => 'Tình trạng thương hiệu không được để trống',
        ];
    }
}
