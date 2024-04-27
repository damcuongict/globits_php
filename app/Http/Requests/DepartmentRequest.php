<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'code' => 'required',
            'name' => 'required',
            'parent_id' => 'nullable|exists:departments,id',
            'company_id' => 'required|exists:companies,id',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'code.required' => 'Mã phòng ban là bắt buộc.',
            'name.required' => 'Tên phòng ban là bắt buộc.',
            'parent_id.exists' => 'Phòng ban cha không tồn tại.',
            'company_id.required' => 'Công ty là bắt buộc.',
            'company_id.exists' => 'Công ty không tồn tại.',
        ];
    }
}
