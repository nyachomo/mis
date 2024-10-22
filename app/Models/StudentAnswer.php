<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    use HasFactory;
    protected $table='student_answers';
    protected $fillable=[
       'user_id',
       'student_assignment_id',
       'student_assignment_question_id',
       'student_answer',
       'student_score',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function studentassignmentquestion(){
        return $this->belongsTo(StudentAssignmentQuestion::class,'student_assignment_question_id','id');
    }

    public function studentassignment(){
        return $this->belongsTo(StudentAssignment::class,'student_assignment_id','id');
    }
}
