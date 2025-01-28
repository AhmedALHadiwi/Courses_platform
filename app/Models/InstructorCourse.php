<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorCourse extends Model
{
    /** @use HasFactory<\Database\Factories\InstructorCourseFactory> */
    use HasFactory;

    protected $fillable =[
        'instructor_id' ,
        'course_id' ,
    ];
}
