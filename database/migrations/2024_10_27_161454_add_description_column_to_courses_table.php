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
        Schema::table('courses', function (Blueprint $table) {
            //
            $table->text('course_intoduction_text')->nullable();
            $table->text('course_description')->nullable(); // Assuming it's a boolean
            $table->text('course_two_like')->nullable(); // Assuming it's a boolean
            $table->text('course_one_like')->nullable(); // Assuming it's a boolean
            $table->text('course_not_interested')->nullable(); // Assuming it's a boolean
            $table->text('course_inclusion')->nullable(); // Assuming it's a boolean
            $table->text('course_leaners_already_enrolled')->nullable(); // Assuming it's a boolean
            $table->text('course_image')->nullable(); // Assuming it's a boolean
            $table->text('course_publisher_name')->nullable(); // Assuming it's a boolean
            $table->text('course_publisher_description')->nullable(); // Assuming it's a boolean
            $table->text('course_publisher_image')->nullable(); // Assuming it's a boolean
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            //
            $table->dropColumn('course_intoduction_text');
            $table->dropColumn('course_description')->nullable();
            $table->dropColumn('course_two_like')->nullable();
            $table->dropColumn('course_one_like')->nullable();
            $table->dropColumn('course_not_interested')->nullable();
            $table->dropColumn('course_inclusion')->nullable();
            $table->dropColumn('course_leaners_already_enrolled')->nullable();
            $table->dropColumn('course_image')->nullable();
            $table->dropColumn('course_publisher_name')->nullable();
            $table->dropColumn('course_publisher_description')->nullable();
            $table->dropColumn('course_publisher_image')->nullable();
        });
    }
};
