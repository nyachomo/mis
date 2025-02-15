<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table='courses';
    protected $fillable=[
        'course_name',
        'course_level',
        'course_duration',
        'course_price',
        'course_status',
        'course_intoduction_text',
        'course_description',
        'course_two_like',
        'course_one_like',
        'course_not_interested',
        'course_inclusion',
        'course_leaners_already_enrolled',
        'what_to_learn',
        'course_image',
        'course_publisher_name',
        'course_publisher_description',
        'course_publisher_image',
        'department_id',
        'course_outline',

    ];

   

    public function studentcourses(){
        return $this->hasMany(StudentCourse::class, 'course_id', 'id');
    }

    public function users(){
        return $this->hasMany(User::class, 'course_id', 'id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_courses', 'course_id', 'student_id');
    }

    public function subjects(){
        return $this->hasMany(Subject::class,'subject_id','id');
    }

    public function exams(){
        return $this->hasMany(Exam::class,'course_id','id');
    }

    public function cats(){
        return $this->hasMany(StudentCat::class,'course_id','id');
    }

    public function department(){
        return $this->belongsTo(Department::class,'department_id','id');
    }

    public function traineecourses(){
        return $this->hasMany(TraineeCourse::class,'course_id','id');
    }
}
