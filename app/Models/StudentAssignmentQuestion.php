<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAssignmentQuestion extends Model
{
    use HasFactory;
    protected $table="student_assignment_questions";
    protected $fillable=[
        'question_name',
        'question_mark',
        'question_answer',
        'question_status',
        'department_id',
        'course_id',
        'clas_id',
        'student_assignment_id',
    ];
}
