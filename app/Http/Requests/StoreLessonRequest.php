<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLessonRequest extends FormRequest
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
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string',
            'content' => 'required|text',
            // 'video_url' => 'required|active_url',
            'video' => 'required|file|mimes:mp4,mov,avi|max:102400',
            'duration' => 'required|integer',
            // 'order' => 'required|integer',
        ];
    }
}
