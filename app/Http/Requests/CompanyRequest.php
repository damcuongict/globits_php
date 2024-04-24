<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'code' => 'required|string|unique:companies',
            'address' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên công ty chưa được nhập.',
            'name.string' => 'Tên công ty phải là chuỗi ký tự.',

            'code.required' => 'Mã công ty chưa được nhập.',
            'code.string' => 'Mã công ty phải là chuỗi ký tự.',
            'code.unique' => 'Mã công ty đã tồn tại trong hệ thống.',

            'address.required' => 'Địa chỉ chưa được nhập.',
            'address.string' => 'Địa chỉ phải là chuỗi ký tự.',
        ];
    }
}
