<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'string',
            'email' => 'string|email',
            'password' => 'string|min:8',
            'role' => 'string|in:guest,student,admin',
            'class' => 'string|in:Primary_One,Primary_Two,Primary_Three,Primary_Four,Primary_Five,Primary_Six,Preparatory_One,Preparatory_Two,Preparatory_Three,Secondary_One,Secondary_Two,Secondary_Three',
            'profile_picture' => 'string|active_url',
            'score' => 'integer',
            'bio' => 'text',
            'phone' => 'string|unique:users,phone|regex:/01[0125][\d]{8}/',
        ];
    }
}
