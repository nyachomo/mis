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
        Schema::table('users', function (Blueprint $table) {
            //

             // Add department_id column and set it as nullable
             $table->unsignedBigInteger('course_id')->nullable()->after('trainee_number'); // Replace 'some_existing_column' with the actual column after which you want to add department_id

             // Set up foreign key constraint for department_id
             $table->foreign('course_id')
                   ->references('id')
                   ->on('courses')
                   ->onDelete('set null'); // This will set department_id to null if the referenced department is deleted
 
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
           
            // Drop foreign key constraints
            $table->dropForeign(['course_id']);
            $table->dropColumn('course_id');
        });
    }
};
