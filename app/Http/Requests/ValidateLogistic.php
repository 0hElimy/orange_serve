<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateLogistic extends FormRequest
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
                    'name' => 'required|unique:logistics|max:255',
                    'url' => 'required|url',
                    'shipping_money' => 'required',
                    'sort' => 'required|integer|between:0,99'
                ];
            case 'PUT':
                return [
                    'name' => 'required|unique:logistics,name,' . $this->route('logistic') . '|max:255',
                    'url' => 'required|url',
                    'shipping_money' => 'required',
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
            'url.required' => '地址 不能为空。',
            'url.url' => '地址 格式不正确。',
            'shipping_money.required' => '运费 不能为空。',
        ];
    }
}
