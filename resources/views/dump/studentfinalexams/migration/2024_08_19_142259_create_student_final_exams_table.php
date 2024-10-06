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
        Schema::create('student_final_exams', function (Blueprint $table) {
            $table->id();
            $table->text('exam_type')->nullable();
            $table->text('exam_name')->nullable();
            $table->text('exam_start_date')->nullable();
            $table->text('exam_end_date')->nullable();
            $table->text('exam_duration')->nullable();
            $table->text('exam_instruction')->nullable();
            $table->text('exam_total_score')->nullable();
            $table->text('exam_status')->default('Not published');
            $table->unsignedBigInteger('department_id'); // Foreign key
            $table->unsignedBigInteger('course_id'); // Foreign key
            $table->unsignedBigInteger('clas_id'); // Foreign key
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('clas_id')->references('id')->on('clas')->onDelete('cascade');
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
        Schema::dropIfExists('student_final_exams');
    }
};
