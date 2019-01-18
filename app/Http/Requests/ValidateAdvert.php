<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateAdvert extends FormRequest
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
                    'title' => 'required|unique:adverts|max:255',
                    'category_id' => 'required',
                    'url' => 'required|url',
                    'image' => 'required',
                    'sort' => 'required|integer|between:0,99'
                ];
            case 'PUT':
                return [
                    'title' => 'required|unique:adverts,title,' . $this->route('advert') . '|max:255',
                    'category_id' => 'required',
                    'url' => 'required|url',
                    'image' => 'required',
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
            'url.required' => '广告地址 不能为空。',
            'url.url' => '广告地址 格式不正确。',
            'image.required' => '缩略图 不能为空。',
        ];
    }
}
