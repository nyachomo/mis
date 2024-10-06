<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table="questions";

    protected $fillable=[
            'question_name',
            'question_mark',
            'question_answer',
            'course_id',
            'exam_id',
    ];

    public function exam(){
        return $this->belongsTo(Subject::class,'exam_id','id');
    }
}
