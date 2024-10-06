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
        Schema::create('student_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Foreign key
            $table->unsignedBigInteger('student_assignment_id')->nullable(); // Foreign key
            $table->unsignedBigInteger('student_assignment_question_id')->nullable(); // Foreign key
            $table->text('student_answer')->nullable();
            $table->text('student_score')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('student_assignment_id')->references('id')->on('student_assignments')->onDelete('cascade');
            $table->foreign('student_assignment_question_id')->references('id')->on('student_assignment_questions')->onDelete('cascade');
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
        Schema::dropIfExists('student_answers');
    }
};
