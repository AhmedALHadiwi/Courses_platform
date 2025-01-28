<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'duration' => 'required|integer',
            'language' => 'required|string',
            'level' => 'required|string|in:Primary_One,Primary_Two,Primary_Three,Primary_Four,Primary_Five,Primary_Six,Preparatory_One,Preparatory_Two,Preparatory_Three,Secondary_One,Secondary_Two,Secondary_Three',
            'instructor_id' => 'required|exists:instructors,id',
        ];
    }
}
