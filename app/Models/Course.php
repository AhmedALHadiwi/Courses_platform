<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory ,SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'price',
        'duration',
        'language',
        'level',
        'instructor_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class, 'course_id');
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }

    public function quizzes(): HasMany
    {
        return $this->hasMany(Quiz::class, 'course_id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'course_id');
    }

    public function instructors(): BelongsTo
    {
        return $this->belongsTo(Instructor::class,  'instructor_id');
    }

}
