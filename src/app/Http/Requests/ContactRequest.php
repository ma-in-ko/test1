<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
    public function rules():array
    {
        return [
            'last_name'   => 'required|string',
            'first_name'  => 'required|string',
            'gender'      => 'required',
            'email'       => 'required|email',
            'tel1'        => 'required|digits_between:2,4',
            'tel2'        => 'required|digits_between:2,4',
            'tel3'        => 'required|digits_between:3,4',
            'address'     => 'required|string',
            'building'    => 'nullable|string',
            'category_id' => 'required|integer',
            'detail'     => 'required|string|max:120',
        ];
    }
        
    public function messages(): array
    {
        return [
            'last_name.required'   => '姓を入力してください。',
            'first_name.required'  => '名を入力してください。',
            'gender.required'      => '性別を選択してください。',
            'email.required'       => 'メールアドレスを入力してください。',
            'email.email'          => 'メールアドレスはメール形式で入力してください。',
            'tel1.required'        => '電話番号を入力してください',
            'tel2.required'        => '電話番号を入力してください',
            'tel3.required'        => '電話番号を入力してください',
            'address.required'     => '住所を入力してください。',
            'category_id.required' => 'お問い合わせの種類を選択してください。',
            'detail.required'     => 'お問い合わせ内容を入力してください。',
            'detail.max'          => 'お問い合わせ内容は120文字以内で入力してください。',
        ];
    }
}