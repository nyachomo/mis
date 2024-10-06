<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentFinalExam extends Model
{
    use HasFactory;
    protected $table="student_final_exams";
    protected $fillable=[
         'exam_type',
         'exam_name' ,
         'exam_start_date' ,
         'exam_end_date' ,
         'exam_duration' ,
         'exam_instruction' ,
         'exam_total_score' ,
         'exam_status' ,
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
}
