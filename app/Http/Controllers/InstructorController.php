<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Http\Requests\StoreInstructorRequest;
use App\Http\Requests\UpdateInstructorRequest;
use DB;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructors = Instructor::all();
        return $this->http_response($instructors,200);
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
    public function store(StoreInstructorRequest $request)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Create the Instructor
            $Instructor = $request->validated();
            Instructor::create($Instructor);


            // Commit the transaction
            DB::commit();

            // Return a success response
            return response()->json([
                'message' => 'Instructor created successfully.',
                'Instructor' => $Instructor,
            ], 201);
        } catch (\Exception $e) {
            // Rollback the transaction
            DB::rollBack();

            // Return an error response
            return response()->json([
                'message' => 'An error occurred while creating the Instructor.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $instructor = Instructor::with('courses')->where('id' ,'=',$id)->first();
        return $this->http_response($instructor,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instructor $instructor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInstructorRequest $request, Instructor $instructor)
    {
        $request = $request->validated();
        $instructor = $instructor->update($request);
        if ($instructor){
            return response()->json([
                'message' => 'instructor updated  successfully.',
                'instructor' => $request,
            ], 201);
        }

        return response()->json('An error occurred while updating the instructor.', 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructor $instructor)
    {
        //
    }
}
