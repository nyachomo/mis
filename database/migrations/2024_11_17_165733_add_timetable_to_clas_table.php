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
        Schema::table('clas', function (Blueprint $table) {
            //
            $table->text('timetable')->nullable(); // Add a nullable 'course_outline' column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clases', function (Blueprint $table) {
            //
            $table->dropColumn('timetable'); // Remove the 'course_outline' column
        });
    }
};
