<?php

use App\Models\Enrollment;
use App\Models\Quiz;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('enrollment_quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Enrollment::class)->constrained();
            $table->foreignIdFor(Quiz::class)->constrained();
            $table->integer('grade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollment_quizzes');
    }
};
