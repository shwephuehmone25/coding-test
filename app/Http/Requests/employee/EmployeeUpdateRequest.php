<?php

namespace App\Http\Requests\employee;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:employees,email,' . $this->route('employee'),
            'phone' => 'required|string|max:15',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_id' => 'required|exists:companies,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The employee name is required.',
            'name.string' => 'The employee name must be a string.',
            'name.max' => 'The employee name cannot exceed 255 characters.',
            'email.required' => 'An email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.max' => 'The email address cannot exceed 255 characters.',
            'email.unique' => 'This email is already associated with another employee.',
            'phone.required' => 'A phone number is required.',
            'phone.max' => 'The phone number cannot exceed 15 characters.',
            'profile.image' => 'The profile must be an image.',
            'profile.mimes' => 'The profile must be a file of type: jpeg, png, jpg, gif.',
            'profile.max' => 'The profile image cannot exceed 2MB.',
            'company_id.required' => 'A company ID is required.',
            'company_id.exists' => 'The selected company is invalid.',
        ];
    }
}
