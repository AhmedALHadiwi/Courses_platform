<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
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
            'quiz_id' => 'integer|exists:quizes,id',
            'content' => 'required|string',
            'type' => 'required|string|in:T\F,MCQ,Text',
            'marks' => 'required|integer',
            'answer_content' => 'required|string',
        ];
    }
}
