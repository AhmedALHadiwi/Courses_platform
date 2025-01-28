<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\InstructorCourse;
use DB;

class CourseController extends Controller
{




    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coursesWithInstructors = Course::query()
        ->join('instructors as i', 'instructor_id', '=', 'i.id')
        ->select(
            'courses.*',
            'i.id as instructor_id',
            'i.name as instructor_name'
        )
        ->get();
        return $this->http_response($coursesWithInstructors , 200);
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
    public function store(StoreCourseRequest $request)
    {
        // Validate the request
        // $validated = $request->validate([
        //     'title' => 'required|string',
        //     'description' => 'required|text',
        //     'price' => 'required|decimal',
        //     'duration' => 'required|integer',
        //     'language' => 'required|string',
        //     'level' => 'required|string|in:Primary_One,Primary_Two,Primary_Three,Primary_Four,Primary_Five,Primary_Six,Preparatory_One,Preparatory_Two,Preparatory_Three,Secondary_One,Secondary_Two,Secondary_Three',
        //     'instructor_id' => 'required|exists:instructors,instructor_id',
        // ]);

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Create the course
            $course = $request->validated();
            Course::create($course);


            // Commit the transaction
            DB::commit();

            // Return a success response
            return response()->json([
                'message' => 'Course created and instructor associated successfully.',
                'course' => $course,
            ], 201);
        } catch (\Exception $e) {
            // Rollback the transaction
            DB::rollBack();

            // Return an error response
            return response()->json([
                'message' => 'An error occurred while creating the course.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $coursesWithInstructors = Course::query()
        ->join('instructors as i', 'instructor_id', '=', 'i.id')
        ->select(
            'courses.*',
            'i.id as instructor_id',
            'i.name as instructor_name'
        )
        ->with(['reviews','lessons'])->where('courses.id','=',$course->id)->get();
        return $this->http_response($coursesWithInstructors , 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {

        $request = $request->validated();
        $course = $course->update($request);
        if ($course){
            return response()->json([
                'message' => 'Course updated  successfully.',
                'course' => $request,
            ], 201);
        }

        return response()->json('An error occurred while updating the course.', 500);


    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        if (isset($course)){
         $course =$course->delete();
         return $this->http_response('Deleted successfully' , 201);
        }

         return $this->http_response("Course isn't Exist",404);
    }

    public function restore_course (Course $course)
    {
        $course = $course->onlyTrashed()->first();

        if ($course->trashed()) {
            $course->restore();
            return $this->http_response('Restored Successfully',201);
        } else {
            return $this->http_response('The course is already in your company',204);
        }
    }

    public function trashed()
    {
        return Course::onlyTrashed()->get();
    }

}
