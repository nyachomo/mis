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
            $table->unsignedBigInteger('department_id')->nullable()->after('trainee_number'); // Replace 'some_existing_column' with the actual column after which you want to add department_id

            // Add clas_id column and set it as nullable
            $table->unsignedBigInteger('clas_id')->nullable()->after('department_id');

            // Set up foreign key constraint for department_id
            $table->foreign('department_id')
                  ->references('id')
                  ->on('departments')
                  ->onDelete('set null'); // This will set department_id to null if the referenced department is deleted

            // Set up foreign key constraint for clas_id
            $table->foreign('clas_id')
                  ->references('id')
                  ->on('clas')
                  ->onDelete('set null'); // This will set clas_id to null if the referenced class is deleted
       
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
            //
            // Drop foreign key constraints
            $table->dropForeign(['department_id']);
            $table->dropForeign(['clas_id']);

            // Drop columns
            $table->dropColumn('department_id');
            $table->dropColumn('clas_id');
        });
    }
};
