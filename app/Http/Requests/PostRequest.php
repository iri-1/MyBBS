<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            // 空入力でAddを押した時にエラーにならないようにように「バリでション validate」をする
        return [
            'title' => 'required|min:3',
            'body' => 'required'
        ];
    }

    public function messages()
    {
        // エラーメッセのカスタマイズー
       return [
            'title.required' => 'タイトルは必須です',
            'title.min' => ':min 文字以上入力してください！',
            'body.required' => '本文は必須です',
       ];
    }
}
