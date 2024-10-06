<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_firstname')->nullable();
            $table->string('user_secondname')->nullable();
            $table->string('user_surname')->nullable();
            $table->string('user_phonenumber')->nullable();
            $table->string('trainee_number')->nullable();
            $table->string('is_admin')->nullable();
            $table->string('is_principal')->nullable();
            $table->string('is_deputy_principal')->nullable();
            $table->string('is_registrar')->nullable();
            $table->string('is_trainer')->nullable();
            $table->string('is_trainee')->nullable();
            $table->string('is_alumni')->nullable();
            $table->string('is_data_clerk')->nullable();
            $table->string('is_exam_officer')->nullable();
            $table->string('is_hod')->nullable();
            $table->string('is_high_school_teacher')->nullable();
            $table->unsignedBigInteger('school_id')->nullable(); // Foreign key
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('set null');
            $table->string('user_status')->default('Active');
            $table->string('user_picture')->default('profile.png');
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'user_firstname' => 'Techsphere',
                'user_secondname' => 'Training',
                'user_surname' => 'Institute',
                'user_phonenumber' =>'0768919307',
                'is_admin' => 'Yes',
                'email' => 'admin@tti.ac.ke',
                'password' => Hash::make(12345678),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
