<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password' => ['required', 'string', 'regex:/^[!-~]+$/'],
            'birthdate' => ['required', 'string'],
            'address' => ['required', 'string'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '名前をを入力してください！',
            'email.required' =>  'メールアドレスを入力してください！',
            'password.required' =>'パスワードを入力してください！',
        ];
    }
}
