<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\EnrollmentQuiz;
use App\Models\Instructor;
use App\Models\InstructorCourse;
use App\Models\Lesson;
use App\Models\Payment;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Review;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Ahmed ALHadiwi',
            'email' => 'ahmedalhadiwi04@gmail.com',
            'phone' => '01224863072',
            'role' => 'admin',
            'class' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'Kamal Ibrahim',
            'email' => 'ibrahimkamal314@gmail.com',
            'phone' => '01125606092',
            'role' => 'admin',
            'class' => 'admin',
        ]);

        User::factory(50)->create();
        Instructor::factory(30)->create();
        Course::factory(50)->create();
        Enrollment::factory(100)->create();
        Lesson::factory(500)->create();
        Quiz::factory(200)->create();
        Question::factory(700)->create();
        Answer::factory(700)->create();
        Payment::factory(100)->create();
        EnrollmentQuiz::factory(100)->create();
        Review::factory(500)->create();
    }
}
