<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_final_exam_questions', function (Blueprint $table) {
            $table->id();
            $table->text("question_name")->nullable();
            $table->text("question_mark")->nullable();
            $table->text("question_answer")->nullable();
            $table->text("question_status")->default('Active');
            $table->unsignedBigInteger('department_id'); // Foreign key
            $table->unsignedBigInteger('course_id'); // Foreign key
            $table->unsignedBigInteger('clas_id'); // Foreign key
            $table->unsignedBigInteger('student_final_exam_id'); // Foreign key
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('clas_id')->references('id')->on('clas')->onDelete('cascade');
            $table->foreign('student_final_exam_id')->references('id')->on('student_final_exams')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_final_exam_questions');
    }
};
