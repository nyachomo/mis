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
            $table->text('has_paid_reg_fee')->nullable(); // Assuming it's a boolean
            $table->text('reg_fee_reference_no')->nullable(); // Assuming it's a string and can be null
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
            $table->dropColumn('has_paid_reg_fee');
            $table->dropColumn('reg_fee_reference_no');
        });
    }
};
