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
        Schema::create('leeds', function (Blueprint $table) {
            $table->id();
            $table->text('student_fullname')->nullable();
            $table->text('student_email')->nullable();
            $table->text('student_phone')->nullable();
            $table->text('student_gender')->nullable();
            $table->text('student_school')->nullable();
            $table->text('student_form')->nullable();
            $table->text('comment')->nullable();
            $table->text('year_data_captured')->nullable();
            $table->text('parent_name')->nullable();
            $table->text('parent_phone')->nullable();
            $table->text('parent_email')->nullable();
            $table->text('student_location')->nullable();
            $table->text('is_form_four')->nullable();
            $table->text('course_register_for')->nullable();
            $table->text('serial_number')->nullable();
            $table->unsignedBigInteger('course_id')->nullable(); // Foreign key
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null');
            $table->unsignedBigInteger('school_id')->nullable(); // Foreign key
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('set null');
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
        Schema::dropIfExists('leeds');
    }
};
