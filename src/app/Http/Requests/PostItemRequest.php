<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostItemRequest extends FormRequest
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
            'name'          => 'required',
            'content'       => 'required',
            'postage'       => 'required',
            'price'         => 'required|integer|min:1|max:10000000',
            'category'      => 'required',
        ];
    }

    public function message() 
    {
        return [
            'name.required'         => '商品名は必須です',
            'content.required'      => '商品情報は必須です',
            'postage.required'      => '送料は必須です',
            'price.*'               => '料金は半角数字で入力してください（※ 1〜10,000,000円）',
            'category.required'     => 'カテゴリーを選択してください',
        ];
    }
}
