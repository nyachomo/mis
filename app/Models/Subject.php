<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table="subjects";
    protected $fillable=[
    'subject_name',
    'subject_status',
    'subject_content',
    'course_id',
    ];

    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }

    public function topics(){
        return $this->hasMany(Topic::class,'subject_id','id');
    }

    public function department()
    {
        return $this->hasOneThrough(Department::class, Course::class, 'id', 'id', 'course_id', 'department_id');
    }

}
