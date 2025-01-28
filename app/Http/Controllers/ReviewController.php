<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use Auth;

class ReviewController extends Controller
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
    public function store(StoreReviewRequest $request)
    {
        $data = $request->validated();
        $review = Review::create([
            'user_id' => Auth::id(), // Get user ID from the authenticated token
            'course_id' => $request->course_id,
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);
        return $this->http_response($review, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, $courseId,$reviewId)
    {
        $review = Review::findOrFail($reviewId);
        // return $review;
        $request = $request->validated();
        $review = $review->update($request);
        if ($review){
            return response()->json([
                'message' => 'review updated successfully.',
                'review' => $request,
            ], 201);
        }

        return response()->json('An error occurred while updating the review.', 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($course,Review $review)
    {
        if (isset($review)){
            $review =$review->delete();
            return $this->http_response('Deleted successfully' , 201);
           }

            return $this->http_response("review isn't Exist",404);
    }
}
