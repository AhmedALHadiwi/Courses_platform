<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\UpdateQuizRequest;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizs = Quiz::with(['questions.answers'])->get();
        return $this->http_response($quizs,200);
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
    public function store(StoreQuizRequest $request)
    {
        \DB::beginTransaction();

        try {
            // Store the quiz
            $request = $request->validated();
            $quiz = Quiz::create($request);

            // Commit the transaction
            \DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Quiz created successfully!',
                'data' => $quiz,
            ], 201);
        } catch (\Exception $e) {
            // Rollback the transaction if something goes wrong
            \DB::rollback();

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create quiz. Please try again.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        $quizs = $quiz->with(['questions.answers'])->get();
        return $this->http_response($quizs,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuizRequest $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}
