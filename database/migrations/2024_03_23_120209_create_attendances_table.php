<?php

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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_rollno')->nullable();
            $table->foreign('student_rollno')->references('roll_no')->on('students')->constrained()->nullOnDelete()->cascadeOnUpdate();;
            $table->string('teacher_id')->nullable();
            $table->foreign('teacher_id')->references('teacher_id')->on('teachers')->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->date('date');
            $table->string('subject');
            $table->enum('status', ['present', 'absent', 'late']);
            $table->unique(['student_rollno','date','subject']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
