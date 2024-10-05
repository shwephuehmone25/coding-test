<?php

namespace App\Http\Requests\employee;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
{
   /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Adjust authorization logic if needed
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees',
            'phone' => 'required|string|max:15',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_id' => 'required|exists:companies,id',
        ];
    }

    /**
     * Get the custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'email.unique' => 'Email must be unique.',
            'phone.required' => 'Phone number is required.',
            'profile.image' => 'Profile must be an image.',
            'profile.mimes' => 'Profile must be a file of type: jpeg, png, jpg, gif.',
            'profile.max' => 'Profile must not be greater than 2MB.',
            'company_id.required' => 'Company ID is required.',
            'company_id.exists' => 'The selected company ID is invalid.',
        ];
    }
}
