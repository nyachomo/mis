<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAssignment extends Model
{
    use HasFactory;
    protected $table="student_assignments";
    protected $fillable=[
         'exam_type',
         'exam_name' ,
         'exam_start_date' ,
         'exam_end_date' ,
         'exam_duration' ,
         'exam_instruction' ,
         'exam_total_score' ,
         'exam_status' ,
         'is_assignment',
         'is_cat',
         'is_final_exam',
         'department_id' ,
         'course_id', 
         'clas_id' ,
    ];

    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }

    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }

    public function clas(){
        return $this->belongsTo(Clas::class,'clas_id');
    }

    public function studentanswer(){
        return $this->hasMany(StudentAnswer::class,'student_assignment_id','id');
    }

}
