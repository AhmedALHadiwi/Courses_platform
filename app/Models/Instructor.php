<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Instructor extends Model
{
    /** @use HasFactory<\Database\Factories\InstructorFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class,'instructor_id');
    }

}
