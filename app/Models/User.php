<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_firstname',
        'user_secondname',
        'user_surname',
        'user_phonenumber',
        'gender',
        'trainee_number',
        'is_admin',
        'is_principal',
        'is_deputy_principal',
        'is_registrar',
        'is_trainer',
        'is_trainee',
        'is_applicant',
        'has_paid_reg_fee',
        'date_reg_fee_paid',
        'reg_fee_reference_no',
        'department_id',
        'clas_id',
        'is_alumni',
        'course_id',
        'is_data_clerk',
        'is_exam_officer',
        'is_hod',
        'is_high_school_teacher',
        'school_id',
        'user_status',
        'user_picture',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function department(){
        return $this->belongsTo(Department::class,'department_id','id');
    }

    public function clas(){
        return $this->belongsTo(Clas::class,'clas_id','id');
    }

    public function studentanswer(){
        return $this->hasMany(StudentAnswer::class,'user_id','id');
    }

    public function school(){
        return $this->belongsTo(School::class,'school_id','id');
    }

    public function course(){
        return $this->belongsTo(Course::class,'course_id','id');
    }

}
