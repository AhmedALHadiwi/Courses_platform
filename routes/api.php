<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('courses',CourseController::class);
    Route::prefix('courses/{courses}')->group(function (){
        Route::apiResource('review', ReviewController::class);
        Route::post('lessons',[ LessonController::class, 'store'])->middleware('role:admin');
        Route::apiResource('lessons', LessonController::class);
        Route::get('trashed',[CourseController::class, 'trashed']);
        Route::put('restore',[CourseController::class, 'restore_course']);
        Route::post('enrollments',[EnrollmentController::class, 'store']);
        Route::put('enrollments',[EnrollmentController::class, 'update']);

    });
    Route::apiResource('quizs/{quizs}/questions',QuestionController::class);

    Route::post('logout', [AuthController::class,'logout']);
    Route::post('instructor',[InstructorController::class, 'store'])->middleware('roles:admin');
    Route::apiResource('instructor',InstructorController::class);
    Route::get('enrollments',[EnrollmentController::class, 'index']);
    Route::apiResource('quizs',QuizController::class);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);

