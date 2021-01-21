<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Productvalidation extends FormRequest
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
            'product_name' => 'required|min:5',
            'product_price' => 'required',
            'product_image' => 'required',
            'product_desc' => 'required',
            'product_content' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'product_name.required' => 'Tên sản phẩm không được để trống',
            'product_name.min'  => 'Tên sản phẩm phải từ 5 ký tự',
            'product_price.required' => 'Giá sản phẩm không được để trống',
            'product_image.required' => 'Hình ảnh sản phẩm không được để trống',
            'product_desc.required' => 'Mô tả sản phẩm không được để trống',
            'product_content.required' => 'Nội Dung sản phẩm không được để trống',
        ];
    }
}
