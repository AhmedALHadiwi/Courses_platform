<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLessonRequest extends FormRequest
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
            'course_id' => 'exists:courses,id',
            'title' => 'string',
            'content' => 'text',
            'video_url' => 'active_url',
            'video' => 'required|file|mimes:mp4,mov,avi|max:102400',
            'duration' => 'integer',
            'order' => 'integer',
        ];
    }
}
