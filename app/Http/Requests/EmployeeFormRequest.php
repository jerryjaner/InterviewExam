<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable|regex:/^09\d{9}$/',
            'company_id' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'phone.regex' => 'The phone number must start with "09" and have 11 digits in total.',
        ];
    }

}
