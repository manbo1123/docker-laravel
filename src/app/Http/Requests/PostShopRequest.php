<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostShopRequest extends FormRequest
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
            'name'      => 'required|min:1|max:30',
            // 'email'     => 'required|email',
            'url'       => 'nullable|url|max:5000',
            'post_code' => 'nullable|integer|digits:7',
            'address'   => 'nullable|max:50',
            'content'   => 'nullable|max:1500',
            'tel'       => 'nullable|min:9|max:15',
        ];
    }

    public function message() 
    {
        return [
            'name.required' => 'ショップ名は必須です（30文字以内）。',
            // 'email.*'       => 'メール形式で入力してください。',
            'url.*'         => 'URL形式で:max文字以内で入力してください。',
            'post_code.*'   => '半角数字:digits文字で入力してください。',
            'address.*'     => ':attributeは:max文字以内で入力してください。',
            'content.*'     => ':max文字以内で入力してください。',
            'tel.*'         => ':attributeは:min-:max文字以内で入力してください。',
        ];
    }

    public function attributes()
    {
        return [
            'name'      => 'ショップ名',
            'post_code' => '郵便番号',
            'address'   => '住所',
            'content'   => '紹介文',
            'tel'       => '電話番号',
        ];
    }
}
