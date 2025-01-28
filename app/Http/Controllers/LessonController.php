<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLessonRequest $request, $courseId)
    {

        $request = $request->validated();

        // Store the video in the 'videos' directory inside the 'public' disk
        $videoPath = $request->file('video')->store('videos', 'public');

        // Create a new lesson
        $lesson = Lesson::create([
            'course_id' => $courseId,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'video_url' => $videoPath, // Save the path of the video
            'duration' => $request->input('duration'),
            'order' => $request->input('order'),
        ]);

        return response()->json([
            'message' => 'Lesson created successfully.',
            'lesson' => $lesson,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($courseId,Lesson $lesson)
    {
        return $this->http_response($lesson,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
