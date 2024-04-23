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
    public function authorize(): bool
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
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8|max:255',
            'is_active' => 'required|boolean',
            
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên.',
            'email.required' => 'Bạn chưa nhập email.',
            'password.required' => 'Bạn chưa nhập mật khẩu.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.max' => 'Mật khẩu không được vượt quá 255 ký tự.',
        ];
    }
}
