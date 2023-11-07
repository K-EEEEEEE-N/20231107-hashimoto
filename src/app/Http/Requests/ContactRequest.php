<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

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
    public function rules()
    {
        return [
            'last-name' => ['required', 'string', 'max:255'],
            'first-name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'max:255', 'email'],
            'postcode' => ['required', 'regex:/^[0-9]{3}-[0-9]{4}$/', 'min:8', 'max:8'],
            'address' => ['required', 'string', 'max:255'],
            'building_name' => ['string', 'max:255', 'nullable'],
            'opinion' => ['required', 'string', 'max:120']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'postcode' => Str::replace('－', '-', mb_convert_kana($this->postcode, 'a')),
        ]);
    }


    public function messages()
    {
        return [
            'last-name.required' => '姓を入力してください',
            'last-name.string' => '姓を文字列で入力してください',
            'last-name.max' => '姓を255文字以下で入力してください',
            'first-name.required' => '名を入力してください',
            'first-name.string' => '名を文字列で入力してください',
            'first-name.max' => '名を255文字以下で入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスを文字列で入力してください',
            'email.max255' => 'メールアドレスを255文字以下で入力してください',
            'email.email' => '有効なメールアドレス形式を入力してください',
            'postcode.required' => '郵便番号を入力してください',
            'postcode.regex' => 'ハイフン（ー）を含む８文字で入力してください',
            'postcode.min' => 'ハイフン（ー）を含む８文字で入力してください',
            'postcode.max' => 'ハイフン（ー）を含む８文字で入力してください',
            'address.required' => '住所を入力してください',
            'address.string' => '住所を文字列で入力してください',
            'address.max' => '住所を255文字以下で入力してください',
            'building_name.string' => '建物名を文字列で入力してください',
            'building_name.max' => '建物名を255文字以下で入力してください',
            'opinion.required' => 'ご意見を入力してください',
            'opinion.string' => 'ご意見を文字列で入力してください',
            'opinion.max' => 'ご意見を120文字以下で入力してください',
        ];
    }
}
