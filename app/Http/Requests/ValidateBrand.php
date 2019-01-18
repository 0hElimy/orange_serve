<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateBrand extends FormRequest
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
                    'name' => 'required|unique:brands|max:255',
                    'category_id' => 'required',
                    'sort' => 'required|integer|between:0,99'
                ];
            case 'PUT':
                return [
                    'name' => 'required|unique:brands,name,' . $this->route('brand') . '|max:255',
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
