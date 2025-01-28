<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use DB;

class QuestionController extends Controller
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
    public function store(StoreQuestionRequest $request, $quizId)
    {
        // $request = $request->validated();
        // $question = Question::create([
        //     'quiz_id' => 'integer|exists:quizes,id',
        //     'content' => 'required|string',
        //     'type' => 'required|string|in:T\F,MCQ,Text',
        //     'marks' => 'required|integer',
        //     'answer_content' => 'required|string',
        // ]);

        DB::beginTransaction();

        try {

            $request = $request->validated();
            $question = Question::create([
                'quiz_id' => $quizId ,
                'content' => $request['content'],
                'type' => $request['type'] ,
                'marks' => $request['marks'] ,
            ]);

            $answer = Answer::create([
                'question_id'=> $question->id,
                'content'=> $request['answer_content'],
            ]);

            // Commit the transaction
            DB::commit();

            // Return a success response
            return response()->json([
                'message' => 'question created and instructor associated successfully.',
                'question' => $request,
            ], 201);
        } catch (\Exception $e) {
            // Rollback the transaction
            DB::rollBack();

            // Return an error response
            return response()->json([
                'message' => 'An error occurred while creating the question.',
                'error' => $e->getMessage(),
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, $quizId,Question $question)
    {

        // return $question;
        $request = $request->validated();
        $question = $question->update($request);
        if ($question){
            return response()->json([
                'message' => 'question updated successfully.',
                'question' => $request,
            ], 201);
        }

        return response()->json('An error occurred while updating the question.', 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($quizId,Question $question)
    {
        //
    }
}
