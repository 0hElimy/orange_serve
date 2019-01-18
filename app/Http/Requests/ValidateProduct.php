<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateProduct extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'pro_name' => 'required|unique:products|max:255',
                    'name' => 'required|unique:product_properties|max:255',
                    'value' => 'required|unique:product_properties|max:255',
                    'category_id' => 'required',
                    'brand_id' => 'required',
                    'image' => 'required',
                    'price' => 'required',
                    'stock' => 'required',
                    'sort' => 'required|integer|between:0,99'
                ];
            case 'PUT':
                return [
                    'pro_name' => 'required|unique:products,pro_name,' . $this->route('product') . '|max:255',
                    'category_id' => 'required',
                    'sort' => 'required|integer|between:0,99'
                ];
        }
    }

    /***
     * 自定义验证信息
     * @return array
     */
    public function messages()
    {
        return [
            'sort.required' => '排序 不能为空。',
        ];
    }
}
