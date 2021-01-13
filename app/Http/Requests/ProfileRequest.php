<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' => 'required_without|string|max:255|min:3',
            'email' => 'required_without|string|email|max:255',
            'password' => 'required_without|string|min:8|confirmed',
        ];
    }

    public function messages() {
        return [
            'required' => 'هذا الحقل مطلوب',
            'string' => 'هذا الحقل يجب ان يكون نص',
            'email' => 'هذا الحقل يجب ان يكون بريد الكتروني',
            'unique' => 'هذاء القيمة موجودة مسبقا',
            'min' => 'هذا الحقل يجب ان لايقل عن :min .',
            'max' => 'هذا الحقل يجب ان لايزيد عن :max .',
            'confirmed' => 'كلمات المرور غير متطابقة',
        ];
    }
}
