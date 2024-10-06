<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $table="exams";

    protected $fillable=[
        'exam_type',
        'exam_name',
        'exam_start_date',
        'exam_end_date',
        'exam_duration',
        'exam_instruction',
        'exam_total_score',
        'exam_status',
        'course_id',
        'department_id',
        'clas_id'
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

    public function questions(){
        return $this->hasMany(Question::class,'exam_id','id');
    }
}
