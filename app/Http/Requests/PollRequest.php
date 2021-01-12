<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PollRequest extends FormRequest
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
            'description' => 'required|min:20',
            'title*' => 'required|min:6'
        ];
    }

    public function messages() {
        return [
            'required' => 'هذا الحقل مطلوب',
            'min' => 'هذا الحقل يجب ان لايقل عن :min .',
        ];
    }
}
