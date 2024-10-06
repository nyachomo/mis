<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraineeCourse extends Model
{
    use HasFactory;
    protected $table='trainee_courses';
    protected $fillable=[
       'user_id',
       'course_id',
    ];

    public function course(){
        return $this->belongsTo(Course::class,'course_id','id');
    }
}
