<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'company_id' => 'required|exists:companies,id',

        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Vui lòng nhập mã dự án.',
            'code.string' => 'Mã dự án phải là chuỗi ký tự.',
            'code.max' => 'Mã dự án không được vượt quá :max ký tự.',
            'name.required' => 'Vui lòng nhập tên dự án.',
            'name.string' => 'Tên dự án phải là chuỗi ký tự.',
            'name.max' => 'Tên dự án không được vượt quá :max ký tự.',
            'description.string' => 'Mô tả phải là chuỗi ký tự.',
            'company_id.required' => 'Vui lòng chọn công ty cho dự án.',
            'company_id.exists' => 'Công ty đã chọn không tồn tại.',

        ];
    }
}
