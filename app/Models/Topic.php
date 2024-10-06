<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
   protected $table="topics";
    protected $fillable=[
       'topic_name',
       'topic_content',
       'image_file',
       'video_link',
       'subject_id',
    ];

    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id','id');
    }

    public function department()
    {
        return $this->hasOneThrough(Department::class, Course::class,Subject::class, 'id','id', 'id','subject_id', 'course_id', 'department_id');
    }
           
}
