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
        Schema::table('leeds', function (Blueprint $table) {
            //
            $table->text('scholarship_letter')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leeds', function (Blueprint $table) {
            //
            $table->dropColumn('scholarship_letter'); // Remove the 'course_outline' column
        });
    }
};
