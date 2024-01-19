<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ["required","alpha","min:3","max:15"],
            'email' => ["required","min:5","max:30","email","unique:users"],
            'username' => ["required","min:3","max:15","alpha_num","unique:users,username"],
            'password' => ["required","max:15",Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()],
            'contact' => ["required","digits_between:10,11"],
            'dob' => ["required","date","before:-18 years","after:-60 years"], 
            'gender' => ["required"],
            'profile' => ["required", 'image'],
            'city' => ["required"],
            'courses' => ["required"]
        ];
    }

    public function messages(): array {
        return [
            'name.min' => 'The name must be at least :min characters.',
            'email.min' => 'The email must be at least :min characters.', // Corrected message
            'name.max' => 'The name may not be greater than :max characters.',
            'email.max' => 'The email may not be greater than :max characters.',
            'email.email' => 'Please enter a valid email address.',
            'dob.before' => 'You are not eligible to apply.',
            'dob.after' => 'Sorry, your age limit exceeded.'
        ];
    }
}
