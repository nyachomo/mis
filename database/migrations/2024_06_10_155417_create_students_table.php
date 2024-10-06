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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->text('student_admno')->nullable();
            $table->text('student_fullname')->nullable();
            $table->text('student_email')->nullable();
            $table->text('phone')->nullable();
            $table->text('student_gender')->nullable();
            $table->unsignedBigInteger('department_id'); // Foreign key
            $table->unsignedBigInteger('clas_id'); // Foreign key
            $table->text('profile_image')->default('profile.png');
            $table->text('student_status')->default('active');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
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
        Schema::dropIfExists('students');
    }
};
