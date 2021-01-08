<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title' => 'required|min:10|max:255',
            'subject' => 'required|min:100',
            'photos.*' => 'required_without:photos|image|mimes:jpg,png,jpeg|max:3072',
        ];
    }

    public function messages() {
        return [
            'required' => 'هذا الحقل مطلوب',
            'required_without' => 'هذا الحقل مطلوب',
            'min' => 'هذا الحقل يجب ان لايقل عن :min .',
            'max' => 'هذا الحقل يجب ان لايزيد عن :max .',
            'mimes' => 'يتم قبول الانواع التالية (.jpg, jpeg, png) فقط',
        ];
    }
}
