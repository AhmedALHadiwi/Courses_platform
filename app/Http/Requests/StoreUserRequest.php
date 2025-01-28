<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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

        // $class = [
        //     'Primary_One',
        //     'Primary_Two',
        //     'Primary_Three',
        //     'Primary_Four',
        //     'Primary_Five',
        //     'Primary_Six',
        //     'Preparatory_One',
        //     'Preparatory_Two',
        //     'Preparatory_Three',
        //     'Secondary_One',
        //     'Secondary_Two',
        //     'Secondary_Three',
        // ];

        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'array|in:guest,student,admin',
            'class' => 'required|string|in:Primary_One,Primary_Two,Primary_Three,Primary_Four,Primary_Five,Primary_Six,Preparatory_One,Preparatory_Two,Preparatory_Three,Secondary_One,Secondary_Two,Secondary_Three',
            // 'class' => 'required|string|in_array:class',
            'profile_picture' => 'string|url|nullable',
            'score' => 'integer|nullable',
            'bio' => 'string|nullable',
            'phone' => 'required|string|unique:users,phone|regex:/01[0125][\d]{8}/',
        ];
    }
}
