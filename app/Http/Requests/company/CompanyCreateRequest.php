<?php

namespace App\Http\Requests\company;

use Illuminate\Foundation\Http\FormRequest;

class CompanyCreateRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:companies', 
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:500',
            'website' => 'nullable|url|max:255',
            'logo' => 'required|image|mimes:jpeg,png|max:2048', 
        ];
    }

    /**
     * Summary of messages
     * @return array<string>
     */
    public function messages()
    {
        return [
            'logo.required' => 'Logo is required.',
            'logo.image' => 'Uploaded file must be an image.', 
            'logo.mimes' => 'Only jpeg, png, jpg formats are allowed for the logo.',
            'email.required' => 'Email field is required!',
            'name.required' => 'Name cannot be empty.',
            'name.max' => 'Name must not be more than 50 characters.',
            'address.required' => 'Address is required.',
            'address.max' => 'Address must not be more than 500 characters.',
            'phone.required' => 'Phone number is required.',
            'phone.max' => 'Phone number must not be more than 15 characters.',
        ];
    }
}
