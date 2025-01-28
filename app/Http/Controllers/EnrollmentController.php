<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Http\Requests\StoreEnrollmentRequest;
use App\Http\Requests\UpdateEnrollmentRequest;
use Auth;


class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth()->user();
        $enrollment = Enrollment::where('user_id', '=',$user->id)->get();
        return $this->http_response($enrollment,200);
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
    public function store($courseId)
    {
        $user = Auth()->user();
        $enrollment = Enrollment::create([
            'user_id' => $user->id,
            'course_id' => $courseId,
            'status' => 'Active',
        ]);

        return $this->http_response($enrollment,201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnrollmentRequest $request, $courseId)
    {

        $user = Auth()->user();
        $request = $request->validated();
        $enrollment = Enrollment::where('course_id','=',$courseId,'and','user_id','=',$user->id)->update($request);
        if ($enrollment){
            return response()->json([
                'message' => 'enrollment updated successfully.',
                'enrollment' => $request,
            ], 201);
        }

        return response()->json('An error occurred while updating the enrollment.', 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        //
    }
}
