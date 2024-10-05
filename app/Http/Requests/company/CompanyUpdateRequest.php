<?php

namespace App\Http\Requests\company;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:companies,email,' . $this->route('id'), 
            'address' => 'required|string|max:500',
            'website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
        ];
    }

    public function messages()
    {
        return [
            'logo.image' => 'Uploaded file must be an image.',
            'logo.mimes' => 'Only jpeg, png, jpg formats are allowed for the logo.',
            'email.required' => 'Email field is required!',
            'name.required' => 'Name cannot be empty.',
            'name.max' => 'Name must not be more than 50 characters.',
            'address.required' => 'Post address is required.',
            'address.max' => 'Address must not be more than 500 characters.',
        ];
    }
}
