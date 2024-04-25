<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
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
            'full_name' => 'required|string|max:255',
            'gender' => 'required|string|in:Male,Female',
            'birthdate' => 'required|date',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'user_id.required' => 'Vui lòng chọn người dùng.',
            'user_id.exists' => 'Người dùng không hợp lệ.',
            'full_name.required' => 'Vui lòng nhập họ và tên.',
            'full_name.string' => 'Họ và tên phải là chuỗi.',
            'full_name.max' => 'Họ và tên không được vượt quá 255 ký tự.',
            'gender.required' => 'Vui lòng chọn giới tính.',
            'gender.string' => 'Giới tính phải là chuỗi.',
            'gender.in' => 'Giới tính phải là "Male" hoặc "Female".',
            'birthdate.required' => 'Vui lòng nhập ngày sinh.',
            'birthdate.date' => 'Ngày sinh phải là một ngày hợp lệ.',
            'phone_number.required' => 'Vui lòng nhập số điện thoại.',
            'phone_number.string' => 'Số điện thoại phải là chuỗi.',
            'phone_number.max' => 'Số điện thoại không được vượt quá 20 ký tự.',
            'address.required' => 'Vui lòng nhập địa chỉ.',
            'address.string' => 'Địa chỉ phải là chuỗi.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'company_id.required' => 'Vui lòng chọn công ty.',
            'company_id.exists' => 'Công ty không hợp lệ.',
        ];
    }
}
